<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Nathan Boiron &middot; @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700">
    </head>
    <body class="@yield('body-class')">
        <div class="container">
            <div class="sidebar">
                <h1>
                    Nathan Boiron
                </h1>

                <h2>Web developer</h2>

                <nav>
                    <a class="{{ $page->menu('') }}" href="/">Home</a>
                    <a class="{{ $page->menu('studies') }}" href="/studies">Studies</a>
                    <a class="{{ $page->menu('experience') }}" href="/experience">Experience</a>
                    <a class="{{ $page->menu('contact') }}" href="/contact">Contact</a>
                    <a class="{{ $page->menu('projects') }}" href="/projects">Personal projects</a>
                    <a href="https://github.com/Mopolo">Github</a>
                </nav>

                <footer>
<pre class="normal" id="duck">
  _
<span id="duckface">-</span>(.)__
 (___/
</pre>
                </footer>
            </div>

            <div class="content">
                @yield('body')
            </div>
        </div>

        <script type="text/javascript">
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-2986016-7', 'mopolo.fr');
            ga('send', 'pageview');
        </script>
        <script src="/js/app.js"></script>
    </body>
</html>
