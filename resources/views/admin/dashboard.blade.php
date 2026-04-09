@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- Welcome --}}
<div style="margin-bottom:32px">
    <h2 style="font-size:1.5rem;font-weight:800;color:var(--text);margin-bottom:6px">
        Selamat Datang 👋
    </h2>
    <p style="color:var(--text-2);font-size:14px">Kelola data lapangan dan pengguna E-ReservLap dari sini.</p>
</div>

{{-- STAT CARDS --}}
<div class="dash-stats">
    <div class="stat-card">
        <div class="stat-icon" style="background:#e0f2fe;color:#0369a1">👤</div>
        <div>
            <div class="stat-num" id="total-users">—</div>
            <div class="stat-lbl">Total Users</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--primary-lt);color:var(--primary-dk)">🏟️</div>
        <div>
            <div class="stat-num" id="total-fields">—</div>
            <div class="stat-lbl">Total Lapangan</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#dcfce7;color:#166534">✅</div>
        <div>
            <div class="stat-num" id="available-fields">—</div>
            <div class="stat-lbl">Lapangan Available</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fee2e2;color:#991b1b">❌</div>
        <div>
            <div class="stat-num" id="unavailable-fields">—</div>
            <div class="stat-lbl">Lapangan Unavailable</div>
        </div>
    </div>
</div>

{{-- QUICK ACCESS --}}
<div class="dash-grid">
    <div class="dash-card">
        <div class="dash-card-header">
            <span class="section-tag">Manajemen</span>
            <h3>Akses Cepat</h3>
        </div>
        <div class="quick-links">
            <a href="/admin/users" class="quick-link">
                <span class="quick-icon">👤</span>
                <div>
                    <div class="quick-title">Kelola Users</div>
                    <div class="quick-desc">Tambah, edit, hapus data pengguna</div>
                </div>
                <span class="quick-arrow">→</span>
            </a>
            <a href="/admin/fields" class="quick-link">
                <span class="quick-icon">🏟️</span>
                <div>
                    <div class="quick-title">Kelola Fields</div>
                    <div class="quick-desc">Tambah, edit, hapus data lapangan</div>
                </div>
                <span class="quick-arrow">→</span>
            </a>
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-card-header">
            <span class="section-tag">Info</span>
            <h3>Status Sistem</h3>
        </div>
        <div style="display:flex;flex-direction:column;gap:12px;padding:0 28px 28px">
            <div class="status-row">
                <span>Database</span>
                <span class="status-ok">● Online</span>
            </div>
            <div class="status-row">
                <span>API Users</span>
                <span class="status-ok" id="status-users">● Mengecek...</span>
            </div>
            <div class="status-row">
                <span>API Fields</span>
                <span class="status-ok" id="status-fields">● Mengecek...</span>
            </div>
        </div>
    </div>
</div>

<style>
.dash-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 28px;
}

.stat-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 16px;
    box-shadow: var(--shadow-sm);
    transition: transform var(--transition), box-shadow var(--transition);
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
}

.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    flex-shrink: 0;
}

.stat-num {
    font-family: 'Space Grotesk', monospace;
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text);
    line-height: 1;
    margin-bottom: 4px;
}

.stat-lbl {
    font-size: 12px;
    color: var(--text-3);
    font-weight: 600;
}

.dash-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.dash-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.dash-card-header {
    padding: 24px 28px 0;
    margin-bottom: 16px;
}

.dash-card-header h3 {
    font-size: 1rem;
    font-weight: 700;
    margin-top: 8px;
}

.quick-links {
    padding: 0 28px 28px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.quick-link {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 16px;
    border-radius: var(--radius-md);
    border: 1px solid var(--border);
    background: var(--bg);
    transition: border-color var(--transition), background var(--transition), transform var(--transition);
    text-decoration: none;
}

.quick-link:hover {
    border-color: var(--primary);
    background: var(--primary-lt);
    transform: translateX(4px);
}

.quick-icon { font-size: 1.3rem; }

.quick-title {
    font-size: 14px;
    font-weight: 700;
    color: var(--text);
}

.quick-desc {
    font-size: 12px;
    color: var(--text-3);
    margin-top: 2px;
}

.quick-arrow {
    margin-left: auto;
    color: var(--text-3);
    font-size: 16px;
    transition: color var(--transition);
}

.quick-link:hover .quick-arrow { color: var(--primary-dk); }

.status-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
    color: var(--text-2);
    font-weight: 500;
}

.status-ok { color: #16a34a; font-weight: 700; font-size: 13px; }
.status-err { color: #dc2626; font-weight: 700; font-size: 13px; }

@media (max-width: 1024px) {
    .dash-stats { grid-template-columns: repeat(2, 1fr); }
    .dash-grid  { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .dash-stats { grid-template-columns: 1fr; }
}
</style>

<script>
const CSRF_TOKEN = '{{ csrf_token() }}';

// Load statistik
Promise.all([
    fetch('/api/users').then(r => r.json()),
    fetch('/api/fields').then(r => r.json())
]).then(([users, fields]) => {
    document.getElementById('total-users').textContent      = users.length;
    document.getElementById('total-fields').textContent     = fields.length;
    document.getElementById('available-fields').textContent = fields.filter(f => f.status === 'available').length;
    document.getElementById('unavailable-fields').textContent = fields.filter(f => f.status === 'unavailable').length;

    document.getElementById('status-users').textContent  = '● Online';
    document.getElementById('status-fields').textContent = '● Online';
}).catch(() => {
    document.getElementById('status-users').className  = 'status-err';
    document.getElementById('status-fields').className = 'status-err';
    document.getElementById('status-users').textContent  = '● Error';
    document.getElementById('status-fields').textContent = '● Error';
});
</script>

@endsection
