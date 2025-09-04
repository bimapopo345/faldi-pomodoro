<style>
    html, body {
        margin: 0 !important;
        padding: 0 !important;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f8f9fa;
        overflow-x: hidden;
        height: 100%;
    }
    
    /* Only reset main content area, not sidebar */
    .main-content * {
        box-sizing: border-box;
    }
    .admin-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        padding: 0;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1001;
        overflow: hidden;
    }
    .admin-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(52, 152, 219, 0.1) 0%, rgba(155, 89, 182, 0.1) 100%);
        pointer-events: none;
    }
    .header-left {
        display: flex;
        align-items: center;
        padding-left: 25px;
        z-index: 2;
    }
    .admin-title {
        color: white;
        font-size: 1.4rem;
        font-weight: 600;
        margin: 0;
        letter-spacing: 0.5px;
    }
    .header-right {
        display: flex;
        align-items: center;
        gap: 20px;
        padding-right: 25px;
        z-index: 2;
    }
    .language-selector {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 6px;
        padding: 6px 12px;
        color: white;
        font-size: 0.9rem;
        font-weight: 600;
        min-width: 50px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }
    .language-selector:hover {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.3);
        transform: translateY(-1px);
    }
    .store-info {
        display: flex;
        align-items: center;
        gap: 8px;
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 8px 12px;
        border-radius: 8px;
    }
    .store-info:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
    }
    .store-icon {
        color: #e74c3c;
        font-size: 1.2rem;
    }
    .theme-toggle {
        background: none;
        border: none;
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.3rem;
        cursor: pointer;
        padding: 8px;
        border-radius: 50%;
        transition: all 0.3s ease;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .theme-toggle:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        transform: rotate(180deg);
    }
    .admin-profile {
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        padding: 8px 15px;
        border-radius: 10px;
        transition: all 0.3s ease;
        position: relative;
    }
    .admin-profile:hover {
        background: rgba(255, 255, 255, 0.1);
    }
    .profile-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.3);
        object-fit: cover;
        transition: all 0.3s ease;
    }
    .admin-profile:hover .profile-avatar {
        border-color: rgba(255, 255, 255, 0.6);
        transform: scale(1.05);
    }
    .profile-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }
    .profile-name {
        color: white;
        font-size: 1rem;
        font-weight: 600;
        margin: 0;
        line-height: 1.2;
    }
    .profile-role {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.8rem;
        margin: 0;
        line-height: 1.2;
    }
    .dropdown-arrow {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.8rem;
        margin-left: 8px;
        transition: all 0.3s ease;
    }
    .admin-profile:hover .dropdown-arrow {
        color: white;
        transform: rotate(180deg);
    }
    @media (max-width: 768px) {
        .admin-header {
            height: 55px;
            padding: 0 15px;
        }
        .header-left {
            padding-left: 15px;
        }
        .header-right {
            padding-right: 15px;
            gap: 15px;
        }
        .admin-title {
            font-size: 1.2rem;
        }
        .store-info span {
            display: none;
        }
        .profile-info {
            display: none;
        }
        .dropdown-arrow {
            display: none;
        }
    }
    @media (max-width: 480px) {
        .header-right {
            gap: 10px;
        }
        .language-selector {
            padding: 4px 8px;
            font-size: 0.8rem;
            min-width: 40px;
        }
        .theme-toggle {
            width: 35px;
            height: 35px;
            font-size: 1.1rem;
        }
        .profile-avatar {
            width: 32px;
            height: 32px;
        }
    }
    .admin-header {
        animation: slideDown 0.5s ease-out;
    }
    @keyframes slideDown {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    
    /* Main content positioning */
    .main-content {
        margin-left: 250px; /* Same as sidebar width */
        margin-top: 60px; /* Same as header height */
        min-height: calc(100vh - 60px);
        padding: 0;
        background: #f8f9fa;
    }
    
    /* Mobile responsive */
    @media (max-width: 768px) {
        .main-content {
            margin-left: 0;
            margin-top: 55px;
        }
    }
</style>
<header class="admin-header">
    <div class="header-left">
        <h1 class="admin-title">Admin Panel</h1>
    </div>
    <div class="header-right">
        <div class="language-selector">
            <span>ID</span>
        </div>
        <div class="store-info">
            <span class="store-icon">🛍️</span>
            <span>My Store</span>
        </div>
        <button class="theme-toggle">
            <span class="theme-icon">🌙</span>
        </button>
        <div class="admin-profile">
            <img src="https://via.placeholder.com/38" alt="Avatar" class="profile-avatar">
            <div class="profile-info">
                <p class="profile-name">Admin User</p>
                <p class="profile-role">Administrator</p>
            </div>
            <span class="dropdown-arrow">▼</span>
        </div>
    </div>
</header>
