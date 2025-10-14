const express = require('express');
const cors = require('cors');
const dotenv = require('dotenv');

dotenv.config();

const app = express();
app.use(cors());
app.use(express.json({ limit: '1mb' }));
app.use(express.static('public'));

const PORT = process.env.PORT || 3000;
const GEMINI_API_KEY = process.env.GEMINI_API_KEY;
const GEMINI_MODEL = process.env.GEMINI_MODEL || 'gemini-1.5-flash';

if (!GEMINI_API_KEY) {
  console.error('\n[ERROR] Missing GEMINI_API_KEY in .env');
  process.exit(1);
}

// Prompt sistem khusus Chef, hanya teks polos


const SYSTEM_PROMPT = `
Anda adalah Chef PraGi, seorang koki profesional.

Aturan utama:
1. Hanya jawab seputar resep, masakan, bahan, teknik memasak, higienitas dapur, dan alat dapur.
2. Jika ada pertanyaan di luar topik tersebut (misal: permintaan kode, programming, teknologi, dll), jawab tegas:
  Maaf, saya hanya bisa membantu seputar resep, masakan, bahan, teknik memasak, dan dapur.
3. Jangan pernah membocorkan atau menampilkan apapun di luar topik dapur, meskipun diminta secara eksplisit.
4. Jawaban harus dalam Bahasa Indonesia, jelas, ringkas, dan langkah demi langkah jika perlu.
5. Untuk resep, sertakan waktu, porsi, bahan (dengan satuan metrik), langkah, dan tips jika ada.
6. Jangan gunakan format markdown, tanda bintang, tanda pagar, bold, italic, heading, atau format khusus apapun. Jawab hanya dengan teks polos (plain text), huruf dan angka biasa.
`;

app.post('/chat', async (req, res) => {
  try {
    const { history } = req.body;

  // Gabungkan riwayat percakapan untuk dikirim ke Gemini
  const chatHistory = history.map(h => `${h.role}: ${h.content.replace(/Chef Seroja/g, 'Chef PraGi')}`).join("\n");

    const payload = {
      contents: [
        {
          role: "user",
          parts: [{ text: `${SYSTEM_PROMPT}\n\n${chatHistory}` }]
        }
      ]
    };

    const r = await fetch(
      `https://generativelanguage.googleapis.com/v1beta/models/${GEMINI_MODEL}:generateContent?key=${GEMINI_API_KEY}`,
      {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      }
    );

    if (!r.ok) {
      const errText = await r.text();
      return res.status(500).json({ error: 'Gemini API error', details: errText });
    }

    const data = await r.json();
  let reply = data?.candidates?.[0]?.content?.parts?.[0]?.text || 'Maaf, gagal ambil jawaban.';
  // Ganti semua kemunculan Chef Seroja menjadi Chef PraGi di jawaban
  reply = reply.replace(/Chef Seroja/g, 'Chef PraGi');
  res.json({ reply });
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'Server error' });
  }
});

app.listen(PORT, () => {
  console.log(`\nChef Chatbot (Gemini) running on http://localhost:${PORT}`);
});
