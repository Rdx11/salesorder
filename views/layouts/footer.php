    <footer class="text-center mt-4">
        <hr>
        <p>&copy; <?= date('Y') ?> - Elegant CRUD App</p>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
        // Simpan preferensi di localStorage
        const isDark = document.body.classList.contains('dark-mode');
        localStorage.setItem('mode', isDark ? 'dark' : 'light');
    }

    // Saat halaman dimuat, cek preferensi mode
    window.addEventListener('DOMContentLoaded', () => {
        const saved = localStorage.getItem('mode');
        if (saved === 'dark') {
            document.body.classList.add('dark-mode');
        }
    });
</script>
</body>
</html>
