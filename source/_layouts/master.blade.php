<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700">
    </head>
    <body>
        <div class="container">
            <div class="sidebar">
                <h1>
                    Nathan<br />
                    Boiron
                </h1>

                <h2>Web developer</h2>

                <nav>
                    <a class="{{ $page->menu('') }}" href="/">Home</a>
                    <a class="{{ $page->menu('about') }}" href="/about">About</a>
                    <a class="{{ $page->menu('experience') }}" href="/experience">Experience</a>
                    <a class="{{ $page->menu('contact') }}" href="/contact">Contact</a>
                    <a class="{{ $page->menu('work') }}" href="/work">Work</a>
                    <a class="{{ $page->menu('projects') }}" href="/projects">Projects</a>
                    <a class="{{ $page->menu('games') }}" href="/games">Games</a>
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
    </body>
</html>
