    </div>
    <!-- Footer -->
    <footer class="bg-blue-800 text-white text-center py-4 text-sm">
      2025 © Copyright GuestBook Office. All Rights Reserved
    </footer>

    <!-- Scroll script -->
    <script>
      const header = document.getElementById("header");
      window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
          header.classList.add("header-scrolled");
        } else {
          header.classList.remove("header-scrolled");
        }
      });
    </script>
  </body>
</html>
