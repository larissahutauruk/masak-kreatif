@extends('layouts.app')

@section('title', 'Masak Kreatif - Resep Siap Saji')

@section('content')
    <!-- Header -->
    <header>
        <nav>
            <div class="logo">
                <img src="{{ asset('storage/image/logo-chef.png') }}" alt="Masak Kreatif">
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">BERANDA</a></li>
                <li><a href="#resep">RESEP</a></li>
                <li><a href="#kategori">KATEGORI ▼</a></li>
                <li><a href="{{ route('about') }}">TENTANG KAMI</a></li>
                <li><a href="#kontak">KONTAK KAMI</a></li>
            </ul>
            <div class="search-bar">
                <input type="text" placeholder="Cari resep...">
                <span>🔍</span>
            </div>
            
            <!-- User Auth Section -->
            @auth
                <div class="user-dropdown">
                    <button class="user-btn">
                        <span class="user-icon">👤</span>
                        <span class="user-name">{{ Auth::user()->name }}</span>
                    </button>
                    <div class="dropdown-menu">
                        <a href="#profile">Profil Saya</a>
                        <a href="#my-recipes">Resep Saya</a>
                        <a href="#favorites">Favorit</a>
                        @if(Auth::user()->isAdmin())
                            <a href="#admin">Dashboard Admin</a>
                        @endif
                        <hr>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-btn">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="auth-buttons">
                    <a href="{{ route('login') }}" class="btn-login">Masuk</a>
                    <a href="{{ route('register') }}" class="btn-register">Daftar</a>
                </div>
            @endauth
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>MASAK KILAT<br>RASA HEBAT</h1>
            <p>Resep siap saji<br>dalam hitungan menit tanpa ribet</p>
            <button class="btn-primary">Cek Resep</button>
        </div>
        <div class="hero-image">
            <img src="{{ asset('storage/image/logo-chef.png') }}" alt="Chef Character" class="chef-character">
        </div>
    </section>

    <!-- Popular Recipes -->
    <section class="popular-recipes" id="resep">
    <div class="section-header">
        <h2>Resep Populer</h2>
        <p>Pilihan resep terpopuler yang wajib kamu coba hari ini</p>
    </div>

    <div class="recipe-grid">
        @foreach ($recipes as $recipe)
            <div class="recipe-card">
                @if($recipe->gambar)
                    <img src="{{ asset('storage/' . $recipe->gambar) }}" alt="{{ $recipe->nama_makanan }}">
                @else
                    <img src="{{ asset('storage/image/default-food.jpg') }}" alt="{{ $recipe->nama_makanan }}">
                @endif
                <div class="bookmark">🔖</div>
                <div class="recipe-info">
                    <h3>{{ $recipe->nama_makanan }}</h3>
                    <div class="recipe-meta">
                        <div class="meta-item">📍 {{ $recipe->asal }}</div>
                        <div class="meta-item">⭐ {{ $recipe->rating }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

    <!-- New Menu -->
    <section class="new-menu">
        <h2>Hari Baru, Menu Baru</h2>
        <p class="new-menu-subtitle">Rekomendasi resep kecil kami tampilkan khusus untukmu hari ini</p>
        <div class="menu-categories">
            <div class="menu-card">
                <img src="{{ asset('storage/image/nasi goreng udang.jpg') }}" alt="Nasi Goreng Udang">
                <div class="menu-overlay">
                    <div class="time-badge">🌅 Pagi</div>
                    <h3 class="menu-title">Nasi Goreng Udang</h3>
                </div>
            </div>
            <div class="menu-card">
                <img src="{{ asset('storage/image/sate ayam.jpg') }}" alt="Sate Ayam">
                <div class="menu-overlay">
                    <div class="time-badge">☀️ Siang</div>
                    <h3 class="menu-title">Sate Ayam</h3>
                </div>
            </div>
            <div class="menu-card">
                <img src="{{ asset('storage/image/kepiting.jpg') }}" alt="Kepiting Saus Padang">
                <div class="menu-overlay">
                    <div class="time-badge">🌙 Malam</div>
                    <h3 class="menu-title">Kepiting Saus Padang</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Chatbot -->
    <section class="chatbot-section">
        <h2>AI Chatbot</h2>
        <p style="color: #666; margin-bottom: 30px;">Tanya apapun seputar resep masakan</p>
        <div class="chatbot-container">
            <img src="{{ asset('storage/image/chatbot.png') }}" alt="Chatbot" class="chatbot-character">
            <div class="chat-window">
                <div class="chat-messages">
                    <div class="message bot">
                        Halo, saya Chefbot, asisten dapur virtualmu. Ada yang bisa saya bantu hari ini?
                    </div>
                    <div class="message user">
                        Apa bahan utama untuk membuat nasi goreng yang enak? Gimana supaya rasanya enak?
                    </div>
                </div>
                <div class="chat-input">
                    <input type="text" placeholder="Ketik pesanmu di sini...">
                    <button class="send-btn">📤</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-brand">
                <img src="{{ asset('storage/image/logo-chef.png') }}" alt="Masak Kreatif">
                <h3>Masak Kreatif</h3>
                <p>Resep Nikmat Setiap Hari!</p>
            </div>
            <div class="footer-section">
                <h4>Menu</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="#resep">Resep</a></li>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li><a href="#kontak">Kontak Kami</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Kategori</h4>
                <ul>
                    <li><a href="#dessert">Dessert</a></li>
                    <li><a href="#seafood">Seafood</a></li>
                    <li><a href="#minuman">Minuman</a></li>
                    <li><a href="#nusantara">Masakan Nusantara</a></li>
                    <li><a href="#internasional">Masakan Internasional</a></li>
                    <li><a href="#ringan">Masakan Ringan</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Help</h4>
                <ul>
                    <li><a href="#privacy">Kebijakan Privasi</a></li>
                    <li><a href="#terms">Syarat & Ketentuan</a></li>
                    <li><a href="#help">Pusat Bantuan</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            © 2025 Masak Kreatif - All Rights Reserved
        </div>
    </footer>

    <style>
        /* User Authentication Styles */
        .auth-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn-login, .btn-register {
            padding: 8px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
        }

        .btn-login {
            color: #ff7e7e;
            border: 2px solid #ff7e7e;
            background: white;
        }

        .btn-login:hover {
            background: #ff7e7e;
            color: white;
        }

        .btn-register {
            background: linear-gradient(135deg, #ff7e7e 0%, #ff9999 100%);
            color: white;
            border: none;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 126, 126, 0.3);
        }

        /* User Dropdown */
        .user-dropdown {
            position: relative;
        }

        .user-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            background: white;
            border: 2px solid #ff7e7e;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            color: #333;
            transition: all 0.3s;
        }

        .user-btn:hover {
            background: #ff7e7e;
            color: white;
        }

        .user-icon {
            font-size: 20px;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 10px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            min-width: 200px;
            z-index: 1000;
            overflow: hidden;
        }

        .user-dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu a {
            display: block;
            padding: 12px 20px;
            color: #333;
            text-decoration: none;
            transition: background 0.3s;
        }

        .dropdown-menu a:hover {
            background: #fff5f5;
            color: #ff7e7e;
        }

        .dropdown-menu hr {
            margin: 5px 0;
            border: none;
            border-top: 1px solid #f0f0f0;
        }

        .logout-btn {
            width: 100%;
            padding: 12px 20px;
            background: none;
            border: none;
            color: #ff4444;
            text-align: left;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background: #fff5f5;
        }

        @media (max-width: 768px) {
            .auth-buttons {
                flex-direction: column;
                gap: 5px;
            }

            .btn-login, .btn-register {
                padding: 6px 15px;
                font-size: 12px;
            }

            .user-btn {
                padding: 6px 12px;
                font-size: 12px;
            }
        }
    </style>
@endsection