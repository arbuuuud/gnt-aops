<div id="post-comment" class="panel panel-mpr">
    <div class="panel-heading">Sampaikan Komentar Anda</div>
    <div class="panel-body">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#fb-comment" aria-controls="home" role="tab" data-toggle="tab">Melalui Facebook</a></li>
            <li role="presentation"><a href="#web-comment" aria-controls="profile" role="tab" data-toggle="tab">Melalui Disqus</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="fb-comment">
                <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="web-comment">
                <div id="disqus_thread"></div>
                <script type="text/javascript">
                    /* * * CONFIGURATION VARIABLES * * */
                    var disqus_shortname = 'mprgoid';
                    
                    /* * * DON'T EDIT BELOW THIS LINE * * */
                    (function() {
                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
            </div>
        </div>
    </div>
</div>