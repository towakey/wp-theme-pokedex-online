        </main>
        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">&copy; 2022 <?php echo get_bloginfo('name');?>.</div>
            </div>
        </footer>
        <!-- Materialize JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                var elements=document.querySelectorAll('.sidenav');
                var instances=M.Sidenav.init(elements, {});
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <?php wp_footer(); ?>
    </body>
</html>