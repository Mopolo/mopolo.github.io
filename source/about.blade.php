@extends('_layouts.master')

@section('body')
    <div class="main">
        <h2 class="section-title">About</h2>

        <div>
            <div class="left">

                <pre class="normal hide-on-mobile about-tour">
      .
     .|.
     |||
     |||
     |||
     |||
     j_I
    .)_(.
    |===|
    /___\
   //___\\
  /=======\
 / .-"""-. \
|__|     |__|
        </pre>

            </div>

            <div class="about-top">
                <p>
                    My real name is Nathan Boiron and I'm <span id="age">27</span>.
                </p>

                <p>
                    I was born in Bordeaux (France) and I studied computer science to make websites and stuff!
                </p>
            </div>
        </div>

        <div class="left about-right">
            <h3>Studies</h3>

            <div>
                <dl class="dl-horizontal">
                    <dt>2013 &mdash; 2014</dt>
                    <dd>Supinfo Montréal</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>2012 &mdash; 2013</dt>
                    <dd>Supinfo Paris</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>2011 &mdash; 2012</dt>
                    <dd>Licence in IT in Amiens</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>2009 &mdash; 2011</dt>
                    <dd>DUT in IT in Amiens</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>2009</dt>
                    <dd>Baccalauréat Scientifique</dd>
                </dl>
            </div>
        </div>
    </div>
@endsection
