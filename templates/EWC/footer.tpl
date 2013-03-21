    </div><!-- /content -->
    
    <if isset($userinfo['loginname'])>
        <footer>
        
        </footer>
    </if>
    
    </div><!-- /container -->
    <div class="modal hide fade in" id="dialogabout">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">&times;</a>
            <h3>About</h3>
        </div>
        <div class="modal-body">

            <span>EWC &copy; {$current_year} by <a href="http://www.http://eco-webcontrol.com/" rel="external">the EWC Team</a></span>
            <if $lng['translator'] != ''>
                <br /><span>{$lng['panel']['translator']}: {$lng['translator']}
            </if>
            <br />
            <span>Theme by <a href="http://www.delacap.com/" rel="external">DELACAP</a>. Based on <a href="http://twitter.github.com/bootstrap/" rel="external">Twitter Bootstrap</a>.</span>
        
        </div>
    </div>
    <div class="modal hide fade in" id="dialogmodal"></div>
    <div class="modal hide fade in" id="dialogerror"></div>
    <script type="text/javascript" src="templates/{$theme}/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="templates/{$theme}/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="templates/{$theme}/assets/js/select.js"></script>
    <script type="text/javascript" src="templates/{$theme}/assets/js/nav.js"></script>
    <script type="text/javascript" src="templates/{$theme}/assets/js/form.js"></script>
    <script type="text/javascript" src="templates/{$theme}/assets/js/main.js"></script>
</body>
</html>