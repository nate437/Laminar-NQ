<?php

session_start();
if (!isset($_SESSION["UID"]))
  header('Location: loginreq.html');
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#121314">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#121314">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="black-transparent">

  <title>iNQueue</title>

  <link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="favicons/favicon-194x194.png" sizes="194x194">
  <link rel="icon" type="image/png" href="favicons/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="favicons/android-chrome-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="favicons/manifest.json">
  <link rel="shortcut icon" href="favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#ff0000">
  <meta name="msapplication-TileImage" content="favicons/mstile-144x144.png">
  <meta name="msapplication-config" content="favicons/browserconfig.xml">
  <meta name="theme-color" content="#121314">

  <link href="http://fonts.googleapis.com/css?family=Lato:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/components.css">

  <script src="js/utils.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/qr.js"></script>
  <script src="https://fb.me/react-0.13.3.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.13.3/JSXTransformer.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 </head>
 <body>

   <div class="menu-nav">
    <img class="home-img" src="favicons/favicon-96x96.png">

    <div class="icon-container">

      <div class="nav-button" id="queuesbut">
        <svg
           xmlns:dc="http://purl.org/dc/elements/1.1/"
           xmlns:cc="http://creativecommons.org/ns#"
           xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
           xmlns:svg="http://www.w3.org/2000/svg"
           xmlns="http://www.w3.org/2000/svg"
           xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
           xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
           width="40"
           height="40"
           id="svg4039"
           version="1.1"
           inkscape:version="0.48.4 r9939"
           sodipodi:docname="New document 2">
          <defs
             id="defs4041" />
          <sodipodi:namedview
             id="base"
             pagecolor="#ffffff"
             bordercolor="#666666"
             borderopacity="1.0"
             inkscape:pageopacity="0.0"
             inkscape:pageshadow="2"
             inkscape:zoom="3.959798"
             inkscape:cx="16.378109"
             inkscape:cy="11.748261"
             inkscape:document-units="px"
             inkscape:current-layer="layer1"
             showgrid="false"
             inkscape:window-width="711"
             inkscape:window-height="719"
             inkscape:window-x="1960"
             inkscape:window-y="41"
             inkscape:window-maximized="0" />
          <metadata
             id="metadata4044">
            <rdf:RDF>
              <cc:Work
                 rdf:about="">
                <dc:format>image/svg+xml</dc:format>
                <dc:type
                   rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                <dc:title></dc:title>
              </cc:Work>
            </rdf:RDF>
          </metadata>
          <g
             inkscape:label="Layer 1"
             inkscape:groupmode="layer"
             id="layer1"
             transform="translate(0,-1012.3622)">
            <path
               inkscape:connector-curvature="0"
               style="text-indent:0;text-align:start;line-height:normal;text-transform:none;block-progression:tb;fill:#000000;fill-opacity:1;-inkscape-font-specification:Bitstream Vera Sans"
               d="m 2.259004,1017.9764 a 0.79931224,0.79931224 0 0 0 -0.6493771,0.7992 l 0,3.1969 a 0.79931224,0.79931224 0 0 0 0.7992336,0.7993 l 3.1969283,0 a 0.79931224,0.79931224 0 0 0 0.7992288,-0.7993 l 0,-3.1969 a 0.79931224,0.79931224 0 0 0 -0.7992288,-0.7992 l -3.1969283,0 a 0.79931224,0.79931224 0 0 0 -0.074895,0 0.79931224,0.79931224 0 0 0 -0.074884,0 z m 0.9490853,1.5984 1.5984659,0 0,1.5985 -1.5984659,0 0,-1.5985 z m 5.369841,0 a 0.80711392,0.80711392 0 0 0 0.2247872,1.5985 l 28.7723645,0 a 0.79931224,0.79931224 0 1 0 0,-1.5985 l -28.7723645,0 a 0.79931224,0.79931224 0 0 0 -0.074893,0 0.80010989,0.80010989 0 0 0 -0.074883,0 0.80273689,0.80273689 0 0 0 -0.074883,0 z m -6.3189263,6.3938 a 0.79931224,0.79931224 0 0 0 -0.6493771,0.7993 l 0,3.197 a 0.79931224,0.79931224 0 0 0 0.7992336,0.7991 l 3.1969283,0 a 0.79931224,0.79931224 0 0 0 0.7992288,-0.7991 l 0,-3.197 a 0.79931224,0.79931224 0 0 0 -0.7992288,-0.7993 l -3.1969283,0 a 0.79931224,0.79931224 0 0 0 -0.074895,0 0.79931224,0.79931224 0 0 0 -0.074884,0 z m 0.9490853,1.5987 1.5984659,0 0,1.5983 -1.5984659,0 0,-1.5983 z m 5.369841,0 a 0.80709619,0.80709619 0 1 0 0.2247872,1.5983 l 28.7723645,0 a 0.79931224,0.79931224 0 1 0 0,-1.5983 l -28.7723645,0 a 0.79931224,0.79931224 0 0 0 -0.074893,0 0.80010989,0.80010989 0 0 0 -0.074883,0 0.80273689,0.80273689 0 0 0 -0.074883,0 z m -6.3189263,6.3938 a 0.79931224,0.79931224 0 0 0 -0.6493771,0.7991 l 0,3.197 a 0.79931224,0.79931224 0 0 0 0.7992336,0.7993 l 3.1969283,0 a 0.79931224,0.79931224 0 0 0 0.7992288,-0.7993 l 0,-3.197 a 0.79931224,0.79931224 0 0 0 -0.7992288,-0.7991 l -3.1969283,0 a 0.79931224,0.79931224 0 0 0 -0.074895,0 0.79931224,0.79931224 0 0 0 -0.074884,0 z m 0.9490853,1.5983 1.5984659,0 0,1.5986 -1.5984659,0 0,-1.5986 z m 5.369841,0 a 0.8071821,0.8071821 0 0 0 0.2247872,1.5986 l 28.7723645,0 a 0.79931885,0.79931885 0 0 0 0,-1.5986 l -28.7723645,0 a 0.79931224,0.79931224 0 0 0 -0.074893,0 0.80010989,0.80010989 0 0 0 -0.074883,0 0.80273689,0.80273689 0 0 0 -0.074883,0 z m -6.3189263,6.394 a 0.79931224,0.79931224 0 0 0 -0.6493771,0.7992 l 0,3.1969 a 0.79931224,0.79931224 0 0 0 0.7992336,0.7993 l 3.1969283,0 a 0.79931224,0.79931224 0 0 0 0.7992288,-0.7993 l 0,-3.1969 a 0.79931224,0.79931224 0 0 0 -0.7992288,-0.7992 l -3.1969283,0 a 0.79931224,0.79931224 0 0 0 -0.074895,0 0.79931224,0.79931224 0 0 0 -0.074884,0 z m 0.9490853,1.5984 1.5984659,0 0,1.5985 -1.5984659,0 0,-1.5985 z m 5.369841,0 a 0.80711392,0.80711392 0 1 0 0.2247872,1.5985 l 28.7723645,0 a 0.79931224,0.79931224 0 1 0 0,-1.5985 l -28.7723645,0 a 0.79931224,0.79931224 0 0 0 -0.074893,0 0.80010989,0.80010989 0 0 0 -0.074883,0 0.80273689,0.80273689 0 0 0 -0.074883,0 z"
               id="path4152" />
          </g>
        </svg>

        <div class="icon-text" >QUEUES</div>
      </div>
      <div class="nav-button" id="savedbut">
        <svg
           xmlns:dc="http://purl.org/dc/elements/1.1/"
           xmlns:cc="http://creativecommons.org/ns#"
           xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
           xmlns:svg="http://www.w3.org/2000/svg"
           xmlns="http://www.w3.org/2000/svg"
           xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
           xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
           width="40"
           height="40"
           id="svg4039"
           version="1.1"
           inkscape:version="0.48.4 r9939"
           sodipodi:docname="queues.svg">
          <defs
             id="defs4041" />
          <sodipodi:namedview
             id="base"
             pagecolor="#ffffff"
             bordercolor="#666666"
             borderopacity="1.0"
             inkscape:pageopacity="0.0"
             inkscape:pageshadow="2"
             inkscape:zoom="2.8"
             inkscape:cx="36.028668"
             inkscape:cy="22.039128"
             inkscape:document-units="px"
             inkscape:current-layer="layer1"
             showgrid="false"
             inkscape:window-width="711"
             inkscape:window-height="719"
             inkscape:window-x="1960"
             inkscape:window-y="41"
             inkscape:window-maximized="0" />
          <metadata
             id="metadata4044">
            <rdf:RDF>
              <cc:Work
                 rdf:about="">
                <dc:format>image/svg+xml</dc:format>
                <dc:type
                   rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                <dc:title></dc:title>
              </cc:Work>
            </rdf:RDF>
          </metadata>
          <g
             inkscape:label="Layer 1"
             inkscape:groupmode="layer"
             id="layer1"
             transform="translate(0,-1012.3622)">
            <path
               inkscape:connector-curvature="0"
               style="text-indent:0;text-align:start;line-height:normal;text-transform:none;block-progression:tb;color:#000000;fill:#000000;fill-opacity:1;overflow:visible;enable-background:accumulate;font-family:Bitstream Vera Sans;-inkscape-font-specification:Bitstream Vera Sans"
               d="m 35.150776,1016.875 a 1.7843952,1.7843952 0 0 0 -1.449676,0.8363 l -16.782789,25.6759 -10.8725683,-9.3949 a 1.7843952,1.7843952 0 1 0 -2.3417839,2.6763 l 12.4337592,10.761 a 1.7843952,1.7843952 0 0 0 2.648444,-0.3902 l 17.925805,-27.3766 a 1.7843952,1.7843952 0 0 0 -1.561191,-2.7878 z"
               overflow="visible"
               id="path4173" />
          </g>
        </svg>

        <div class="icon-text" >SAVED</div>
      </div>

      <div class="nav-button" id="settingsbut">
        <svg
           xmlns:dc="http://purl.org/dc/elements/1.1/"
           xmlns:cc="http://creativecommons.org/ns#"
           xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
           xmlns:svg="http://www.w3.org/2000/svg"
           xmlns="http://www.w3.org/2000/svg"
           xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
           xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
           width="40"
           height="40"
           id="svg4039"
           version="1.1"
           inkscape:version="0.48.4 r9939"
           sodipodi:docname="saved.svg">
          <defs
             id="defs4041" />
          <sodipodi:namedview
             id="base"
             pagecolor="#ffffff"
             bordercolor="#666666"
             borderopacity="1.0"
             inkscape:pageopacity="0.0"
             inkscape:pageshadow="2"
             inkscape:zoom="2.8"
             inkscape:cx="36.028668"
             inkscape:cy="22.039128"
             inkscape:document-units="px"
             inkscape:current-layer="layer1"
             showgrid="false"
             inkscape:window-width="711"
             inkscape:window-height="719"
             inkscape:window-x="1960"
             inkscape:window-y="41"
             inkscape:window-maximized="0" />
          <metadata
             id="metadata4044">
            <rdf:RDF>
              <cc:Work
                 rdf:about="">
                <dc:format>image/svg+xml</dc:format>
                <dc:type
                   rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                <dc:title></dc:title>
              </cc:Work>
            </rdf:RDF>
          </metadata>
          <g
             inkscape:label="Layer 1"
             inkscape:groupmode="layer"
             id="layer1"
             transform="translate(0,-1012.3622)">
            <path
               inkscape:connector-curvature="0"
               style="text-indent:0;text-align:start;line-height:normal;text-transform:none;block-progression:tb;color:#000000;fill:#000000;fill-opacity:1;overflow:visible;enable-background:accumulate;font-family:Bitstream Vera Sans;-inkscape-font-specification:Bitstream Vera Sans"
               d="m 17.499031,1016.356 -0.08003,0.5403 -0.680262,4.2016 c -0.839278,0.241 -1.649115,0.5479 -2.40093,0.9603 l -3.46134,-2.4609 -0.440171,-0.3202 -0.380148,0.3802 -2.7210522,2.7211 -0.3801485,0.3801 0.3201267,0.4402 2.4209344,3.4813 c -0.4163963,0.7535 -0.7339268,1.5573 -0.9803754,2.4009 l -4.1816201,0.7004 -0.5402097,0.08 0,0.5602 0,3.8415 0,0.5202 0.5202007,0.1 4.1816201,0.7403 c 0.2454042,0.8436 0.5823698,1.6461 1.0003844,2.4009 l -2.460952,3.4613 -0.3201222,0.4402 0.3801485,0.3802 2.7210523,2.721 0.380149,0.3801 0.44017,-0.3201 3.461336,-2.4409 c 0.758496,0.419 1.573289,0.7351 2.420938,0.9804 l 0.700271,4.2016 0.08003,0.5402 0.540209,0 3.841489,0 0.540205,0 0.100039,-0.5202 0.740289,-4.2016 c 0.84215,-0.2471 1.627901,-0.6019 2.380921,-1.0204 l 3.521362,2.4609 0.44017,0.3201 0.380149,-0.3801 2.721052,-2.721 0.380149,-0.3802 -0.320127,-0.4601 -2.500965,-3.4614 c 0.409488,-0.7454 0.739186,-1.5492 0.98038,-2.3809 l 4.241642,-0.7403 0.5202,-0.1 0,-0.5202 0,-3.8415 0,-0.5602 -0.540209,-0.08 -4.201629,-0.6803 c -0.242941,-0.8387 -0.587708,-1.6296 -1.000384,-2.381 l 2.460952,-3.5213 0.320122,-0.4402 -0.380144,-0.3801 -2.721056,-2.7211 -0.380145,-0.3802 -0.460179,0.3202 -3.441331,2.4809 c -0.752429,-0.4181 -1.557402,-0.7342 -2.40093,-0.9803 l -0.740289,-4.2217 -0.100039,-0.5202 -0.540205,0 -3.841489,0 -0.540209,0 z m 1.100428,1.2805 2.761065,0 0.700275,4.0216 0.05999,0.4001 0.420162,0.1 c 1.027212,0.2559 1.980284,0.6672 2.861109,1.2005 l 0.360135,0.2201 0.340135,-0.2401 3.301275,-2.3809 1.96076,1.9408 -2.340903,3.3613 -0.240097,0.3401 0.200079,0.3601 c 0.527878,0.8784 0.924977,1.8398 1.180458,2.8611 l 0.120044,0.4002 0.400157,0.08 4.041564,0.6603 0,2.761 -4.041564,0.7004 -0.420166,0.08 -0.100035,0.4001 c -0.252849,1.0204 -0.652713,1.9829 -1.180458,2.8611 l -0.200079,0.3601 0.240097,0.3402 2.380921,3.3213 -1.940751,1.9407 -3.361302,-2.3409 -0.340135,-0.2401 -0.360135,0.2201 c -0.876015,0.5332 -1.837489,0.9407 -2.861109,1.2005 l -0.400157,0.1 -0.08003,0.4002 -0.700271,4.0215 -2.781073,0 -0.660258,-4.0016 -0.05999,-0.4201 -0.420161,-0.1 c -1.02831,-0.2541 -1.995127,-0.6482 -2.881118,-1.1805 l -0.340131,-0.2201 -0.360139,0.2401 -3.321284,2.3209 -1.9407514,-1.9608 2.3409044,-3.2812 0.240096,-0.3401 -0.200079,-0.3602 c -0.537853,-0.8886 -0.964047,-1.8488 -1.2204716,-2.8811 l -0.1000389,-0.4001 -0.4001573,-0.08 -3.9815373,-0.7004 0,-2.761 3.9815373,-0.6603 0.4201657,-0.08 0.1000395,-0.4002 c 0.2591446,-1.036 0.6644546,-2.0138 1.2004626,-2.9011 l 0.220083,-0.3601 -0.240092,-0.3401 -2.3208989,-3.3213 1.9407549,-1.9408 3.301276,2.341 0.34013,0.26 0.36014,-0.2201 c 0.881861,-0.5301 1.852163,-0.928 2.881118,-1.1805 l 0.420161,-0.1 0.05999,-0.4201 0.660257,-4.0016 z M 20,1026.6 c -3.174683,0 -5.762231,2.5875 -5.762231,5.7622 0,3.1747 2.587548,5.7622 5.762231,5.7622 3.174679,0 5.762231,-2.5875 5.762231,-5.7622 0,-3.1747 -2.587552,-5.7622 -5.762231,-5.7622 z m 0,1.2805 c 2.482548,0 4.481733,1.9991 4.481733,4.4817 0,2.4826 -1.999185,4.4817 -4.481733,4.4817 -2.482548,0 -4.481733,-1.9991 -4.481733,-4.4817 0,-2.4826 1.999185,-4.4817 4.481733,-4.4817 z"
               overflow="visible"
               id="path4194" />
          </g>
        </svg>

        <div class="icon-text" >SETTINGS</div>
      </div>

      </div>
    </div>

    <div class="dim"></div>

    <div id="settings-pane" class="modal">
      <div class="wrapper">
        <div class="header">
          settings
        </div>
        <div class="backdrop">
          <a><div class="tappable">account</div></a>
          <a><div class="tappable">privacy</div></a>
          <a><div class="tappable">notifications</div></a>
          <a><div class="tappable">advanced</div></a>
          <a><div class="tappable">help</div></a>
        </div>
      </div>
    </div>

    <div id="about-pane" class="modal">
      <div class="wrapper">
        <div class="header">
          Queue Details
        </div>
        <div class="backdrop details">
          <div id="qrcode"></div>
          <div>
            <span>ID:</span>
            <span id="showId" class=""></span>
          </div>
          <div>
            <span>Password:</span>
            <span id="showPass" class=""></span>
          </div>
        </div>
      </div>
    </div>

    <div id="create-pane" class="modal">
      <div class="wrapper">
        <div class="header">
          create queue
        </div>
        <div class="backdrop">
          <input id="Qtitle" type="text" placeholder="Queue Title"/>
          <div class="stripe"></div>
          <input id="Qpass" type="password" placeholder="Queue Password"/>
          <div class="stripe"></div>
          <div id="image-search">
          </div>
        </div>
        <div id="create-butt">
          Create Queue
        </div>
      </div>
    </div>

    <div id="join-pane" class="modal">
      <div class="wrapper">
        <div class="header">
          join queue
        </div>
        <div class="backdrop">
          <input id="QID" type="number" placeholder="Queue ID"/>
          <div class="stripe"></div>
          <input id="Qpassverif" type="password" placeholder="Queue Password"/>
          <div class="stripe"></div>
        </div>
        <div id="join-butt">
          Join Queue
        </div>
      </div>
    </div>

    <div id="add-pane" class="modal">
      <div class="wrapper">
        <div class="header">
          add song
        </div>
        <div class="backdrop">
          <div id="song-search">
          </div>
        </div>
        <div id="song-butt">
          Add Songs
        </div>
      </div>
    </div>

  <div class="page-container">

    <div class="container" id="queuelistcontainer"></div>

  </div>


<script>
var createShow = function(){
    $("#create-pane, .dim").css({opacity: 1, visibility: "visible"});
}
var joinShow = function(){
    $("#join-pane, .dim").css({opacity: 1, visibility: "visible"});
}
var addSong= function(){
    $("#add-pane, .dim").css({opacity: 1, visibility: "visible"});
}
var removeSong = function(id, qid){
    $.ajax({
      type: "GET",
      url: "http://laminarnq.com/requests/removeFromQueue.php?sid="+id+"&qid=" + qid,
      success: function(data) {
        showQueue(currQ, currT, currS, currI);
      },
      error: function(xhr, status, err) {
        console.error(xhr, status, err.toString());
      }
    });
}
</script>

  <script type="text/jsx" src="js/components.js"></script>
  <script type="text/jsx">

  React.render(<ImageSearch />, document.getElementById('image-search'));
  React.render(<SongSearch />, document.getElementById('song-search'));

  $("#settingsbut").click(function(){
    $("#settings-pane, .dim").css({opacity: 1, visibility: "visible"});
    $("#settingsbut svg g path, #settingsbut .icon-text").css({color: '#26ADC4 !important', fill: '#26ADC4 !important'});
  });

  $(".dim").click(function(){
    $("#settings-pane, #create-pane, #add-pane, #join-pane, #about-pane, .dim").css({opacity: 0, visibility: "hidden"});
  });

  var refreshQueues = function(){
    $.ajax({
      url: "http://laminarnq.com/requests/myQueues.php",
      dataType: 'json',
      cache: false,
      success: function(data) {
        $.ajax({
          url: "http://laminarnq.com/requests/getJoinedQueues.php",
          dataType: 'json',
          cache: false,
          success: function(joinedData) {
            React.render(
              <div>
              <Header title="Queues" subTitle=""/>
              <ButtonSet buttons="{[{text: 'Create', action: createShow}, {text: 'Join', action: joinShow}]}" />
              <QueueList header="My Queues" owned="true" queues={data}/>

               <QueueList header="Joined Queues" owned="false" queues={joinedData}/>
            </div>  , document.getElementById('queuelistcontainer')
            );
          },
          error: function(xhr, status, err) {
            console.error(xhr, status, err.toString());
          }
        });
      },
      error: function(xhr, status, err) {
        console.error(xhr, status, err.toString());
      }
    });
  }

  var currQ = "0";
  var currT = "";
  var currS = "";
  var currI = "";
  var showQueue = function(id, title, sub, img){
    $("#settings-pane, #create-pane, #add-pane, .dim").css({opacity: 0, visibility: "hidden"});
    currQ = id;
    currT = title;
    currS = sub;
    currI = img;
    React.render(
      <div>
      <Header title={title} subTitle={sub} imgSrc={img}/>
      <ButtonSet buttons="{[{text: 'Add Song', action: addSong}]}" />
      <Playlist qid={id} saved={false} url={"requests/getQueue.php?qid=" + id} update={true} />
    </div>  , document.getElementById('queuelistcontainer'));

  }

  var remQueue = function(id){
    $.ajax({
      type: "GET",
      url: "http://laminarnq.com/requests/removeQueue.php?QID=" + id,
      success: function(data) {
        refreshQueues();
      },
      error: function(xhr, status, err) {
        console.error(xhr, status, err.toString());
      }
    });
  }

  var detQueue = function(id, pass){
    var qrcode = new QRCode(document.getElementById("qrcode"), {
      text: "http://laminarnq.com/requests/joinQueue.php?qid="+id+"&pass="+pass,
      width: 128,
      height: 128,
      colorDark : "#2ebd59",
      colorLight : "#000000",
      correctLevel : QRCode.CorrectLevel.H
    });
    $("#showId").html(id);
    $("#showPass").html(pass);
    $("#about-pane, .dim").css({opacity: 1, visibility: "visible"});
  }

  $("#join-butt").click(function(){
    $.ajax({
      type: "GET",
      url: "http://laminarnq.com/requests/joinQueue.php?qid=" + $("#QID").val() + "&pass=" + $("#Qpassverif").val(),
      success: function(data) {
        if (data == "false")
          alert("Incorrect password or Queue ID");
        else{
        refreshQueues();
        $("#settings-pane, #create-pane, #add-pane, #join-pane, .dim").css({opacity: 0, visibility: "hidden"});
        }
      },
      error: function(xhr, status, err) {
        console.error(xhr, status, err.toString());
      }
    });
  });

  $("#create-butt").click(function(){
    $.ajax({
      type: "POST",
      url: "http://laminarnq.com/requests/createQueue.php",
      data: {name: $("#Qtitle").val(), pic: $("input[name=imageSrc]:checked").val(), pass: $("#Qpass").val()},
      success: function(data) {
        refreshQueues();
        $("#settings-pane, #create-pane, #add-pane, #join-pane, .dim").css({opacity: 0, visibility: "hidden"});
      },
      error: function(xhr, status, err) {
        console.error(xhr, status, err.toString());
      }
    });
  });

  $("#song-butt").click(function(){
    var songs = "";
    $("#song-search div input:checked").each(function(i, e){
      songs += "spotify:track:" + $(this).val() + ",";
    })
    songs.slice(0,-1);
    $.ajax({
      type: "POST",
      url: "http://laminarnq.com/requests/addToQueue.php?qid=" + currQ,
      data: {uris: songs},
      success: function(data) {
        showQueue(currQ, currT, currS, currI);
      },
      error: function(xhr, status, err) {
        console.error(xhr, status, err.toString());
      }
    });
  });

  $("#savedbut").click(function(){
    React.render(
      <div>
      <Header title="Saved Tracks" subTitle=""/>
      <div className="sub-container"><Playlist saved={true} url="requests/savedSongs.php" /></div>
    </div>  , document.getElementById('queuelistcontainer'));
  });

  $("#queuesbut").click(function(){
    refreshQueues();
  });

  refreshQueues();
  </script>

 </body>
</html>
