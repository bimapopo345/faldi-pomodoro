<style>
    .sidebar {
        width: 250px;
        height: 100vh;
        background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
        position: fixed;
        left: 0;
        top: 0;
        z-index: 1000;
        overflow-y: auto;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    }
    .sidebar::-webkit-scrollbar {
        width: 4px;
    }
    .sidebar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
    }
    .sidebar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 2px;
    }
    .sidebar::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.5);
    }
    .sidebar-logo {
        padding: 25px 20px;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .logo-container {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    .logo-image {
        width: 35px;
        height: 35px;
        border-radius: 6px;
        object-fit: cover;
    }
    .sidebar-menu {
        padding: 15px 0;
    }
    .menu-item {
        position: relative;
    }
    .menu-link {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.3s ease;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
    }
    .menu-link:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
    }
    .menu-link.active {
        background: linear-gradient(90deg, #3498db, #2980b9);
        color: white;
        position: relative;
    }
    .menu-link.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: #74b9ff;
    }
    .menu-icon {
        width: 20px;
        height: 20px;
        margin-right: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
    }
    .menu-text {
        flex: 1;
    }
    .menu-arrow {
        font-size: 0.8rem;
        transition: transform 0.3s ease;
    }
    .menu-item.expanded .menu-arrow {
        transform: rotate(90deg);
    }
    .submenu {
        background: rgba(0, 0, 0, 0.2);
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }
    .submenu.show {
        max-height: 500px; /* Increased max-height */
    }
    .submenu-link {
        display: flex;
        align-items: center;
        padding: 10px 20px 10px 52px;
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 400;
        transition: all 0.3s ease;
    }
    .submenu-link:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        padding-left: 56px;
    }
    .submenu-link.active {
        background: rgba(52, 152, 219, 0.3);
        color: #74b9ff;
        border-left: 3px solid #74b9ff;
    }
    .sidebar-footer {
        position: sticky;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 20px;
        background: rgba(0, 0, 0, 0.3);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    .expiry-notice {
        text-align: center;
        font-size: 0.85rem;
        color: #f39c12;
        font-weight: 600;
        padding: 10px;
        background: rgba(243, 156, 18, 0.1);
        border-radius: 8px;
        border: 1px solid rgba(243, 156, 18, 0.3);
    }
</style>

<aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <div class="logo-container">
            <img src="https://via.placeholder.com/35" alt="Logo" class="logo-image" id="logoImage">
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-item"><a href="#" class="menu-link active" onclick="setActive(this)"><span class="menu-icon">🛍️</span><span class="menu-text">My Shop</span></a></li>
        <li class="menu-item">
            <button class="menu-link" onclick="toggleSubmenu(this)"><span class="menu-icon">🔧</span><span class="menu-text">Repair</span><span class="menu-arrow">▶</span></button>
            <ul class="submenu">
                <li><a href="#" class="submenu-link" onclick="setActive(this)">All Data</a></li>
                <li><a href="#" class="submenu-link" onclick="setActive(this)">Input data</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <button class="menu-link" onclick="toggleSubmenu(this)"><span class="menu-icon">🧾</span><span class="menu-text">List</span><span class="menu-arrow">▶</span></button>
            <ul class="submenu">
                <li><a href="#" class="submenu-link" onclick="setActive(this)">Penggunaan Sparepart</a></li>
                <li><a href="#" class="submenu-link" onclick="setActive(this)">Kas</a></li>
                <li><a href="#" class="submenu-link" onclick="setActive(this)">Garansi</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <button class="menu-link" onclick="toggleSubmenu(this)"><span class="menu-icon">📱</span><span class="menu-text">Perangkat</span><span class="menu-arrow">▶</span></button>
            <ul class="submenu">
                <li><a href="#" class="submenu-link" onclick="setActive(this)">Penjualan</a></li>
                <li><a href="#" class="submenu-link" onclick="setActive(this)">List</a></li>
                <li><a href="#" class="submenu-link" onclick="setActive(this)">Garansi</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <button class="menu-link" onclick="toggleSubmenu(this)"><span class="menu-icon">🔩</span><span class="menu-text">Acc & Sparepart</span><span class="menu-arrow">▶</span></button>
            <ul class="submenu">
                <li><a href="#" class="submenu-link" onclick="setActive(this)">Penjualan</a></li>
                <li><a href="#" class="submenu-link" onclick="setActive(this)">List</a></li>
                <li><a href="#" class="submenu-link" onclick="setActive(this)">Garansi</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <button class="menu-link" onclick="toggleSubmenu(this)"><span class="menu-icon">📦</span><span class="menu-text">Produk</span><span class="menu-arrow">▶</span></button>
            <ul class="submenu">
                <li><a href="#" class="submenu-link" onclick="setActive(this)">Katalog Produk</a></li>
                <li><a href="#" class="submenu-link" onclick="setActive(this)">Manajemen Stok</a></li>
                <li><a href="#" class="submenu-link" onclick="setActive(this)">Kategori</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <button class="menu-link" onclick="toggleSubmenu(this)"><span class="menu-icon">📉</span><span class="menu-text">Pengeluaran</span><span class="menu-arrow">▶</span></button>
            <ul class="submenu">
                <li><a href="#" class="submenu-link" onclick="setActive(this)">Laporan Bulanan</a></li>
                <li><a href="#" class="submenu-link" onclick="setActive(this)">Kategori Pengeluaran</a></li>
                <li><a href="#" class="submenu-link" onclick="setActive(this)">History</a></li>
            </ul>
        </li>
        <li class="menu-item"><a href="#" class="menu-link" onclick="setActive(this)"><span class="menu-icon">💳</span><span class="menu-text">Credit</span></a></li>
        <li class="menu-item"><a href="#" class="menu-link" onclick="setActive(this)"><span class="menu-icon">👥</span><span class="menu-text">Customers</span><span class="menu-badge">12</span></a></li>
    </ul>
    <div class="sidebar-footer">
        <div class="expiry-notice"></div>
    </div>
</aside>

<script>
    function toggleSubmenu(element) {
        const menuItem = element.closest('.menu-item');
        const submenu = menuItem.querySelector('.submenu');
        const isExpanded = menuItem.classList.contains('expanded');

        document.querySelectorAll('.menu-item').forEach(item => {
            if (item !== menuItem) {
                item.classList.remove('expanded');
                const otherSubmenu = item.querySelector('.submenu');
                if (otherSubmenu) {
                    otherSubmenu.classList.remove('show');
                }
            }
        });

        if (isExpanded) {
            menuItem.classList.remove('expanded');
            submenu.classList.remove('show');
        } else {
            menuItem.classList.add('expanded');
            submenu.classList.add('show');
        }
    }

    function setActive(element) {
        document.querySelectorAll('.menu-link, .submenu-link').forEach(link => {
            link.classList.remove('active');
        });
        element.classList.add('active');
        if (element.classList.contains('submenu-link')) {
            const parentMenuItem = element.closest('.menu-item');
            const parentMenuLink = parentMenuItem.querySelector('.menu-link');
            parentMenuLink.classList.add('active');
        }
    }

    function updateExpiryNotice() {
        const expiryDate = new Date('2025-10-12');
        const now = new Date();
        const timeDiff = expiryDate.getTime() - now.getTime();
        const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

        const expiryNotice = document.querySelector('.expiry-notice');
        if(expiryNotice) {
            if (daysDiff > 0) {
                expiryNotice.innerHTML = `Expires in ${daysDiff} days<br><small>2025-10-12</small>`;
                if (daysDiff <= 30) {
                    expiryNotice.style.background = 'rgba(231, 76, 60, 0.1)';
                    expiryNotice.style.color = '#e74c3c';
                    expiryNotice.style.borderColor = 'rgba(231, 76, 60, 0.3)';
                }
            } else {
                expiryNotice.innerHTML = `Expired ${Math.abs(daysDiff)} days ago`;
                expiryNotice.style.background = 'rgba(231, 76, 60, 0.2)';
                expiryNotice.style.color = '#e74c3c';
                expiryNotice.style.borderColor = 'rgba(231, 76, 60, 0.5)';
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const logoImage = document.getElementById('logoImage');
        if(logoImage) {
            logoImage.onerror = function() {
                this.style.display = 'none';
                const logoContainer = this.parentElement;
                logoContainer.innerHTML = '<div style="width: 35px; height: 35px; background: linear-gradient(135deg, #27ae60, #2ecc71); border-radius: 6px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 14px;">P</div>';
            };
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const mobileToggle = document.querySelector('.mobile-toggle');
            if (window.innerWidth <= 768) {
                if (sidebar && !sidebar.contains(event.target) && mobileToggle && !mobileToggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });

        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar && window.innerWidth > 768) {
                sidebar.classList.remove('show');
            }
        });

        updateExpiryNotice();
        setInterval(updateExpiryNotice, 3600000);
    });
</script>