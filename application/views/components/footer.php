    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    2019 © gh.sinvahome.com. - dev by:quocbinh
                </div>
            </div>
        </div>
    </footer>

    <?php 
        foreach ($vendors as $group_plugin => $plugins) 
        {
            echo '<!-- ::: Plugin Config Path ::: resrouces/vendors/'.$group_plugin.'.json'.' -->';
            foreach ($plugins as $link) 
            {
                echo '<script src="'. base_url().'vendors/' . $link . '"></script>';
            }
        }
     ?>

     <!-- copy text -->
    
    <script type="text/javascript">
        $(function(){
          new Clipboard('.copy-text');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
</body>
</html>