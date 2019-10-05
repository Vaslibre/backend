{{-- <svg
    class="fill-current"
    width="{{ $width ?? '126' }}"
    height="{{ $height ?? '24' }}"
    viewBox="{{ $viewBox ?? '0 0 126 24' }}"
    xmlns="http://www.w3.org/2000/svg"
>
    <path d="M40.76 18h-6.8V7.328h2.288V16h4.512v2zm8.064 0h-2.048v-.816c-.528.64-1.44 1.008-2.448 1.008-1.232 0-2.672-.832-2.672-2.56 0-1.824 1.44-2.496 2.672-2.496 1.04 0 1.936.336 2.448.944v-.976c0-.784-.672-1.296-1.696-1.296-.816 0-1.584.32-2.224.912l-.8-1.424c.944-.848 2.16-1.216 3.376-1.216 1.776 0 3.392.704 3.392 2.928V18zm-3.68-1.184c.656 0 1.296-.224 1.632-.672v-.96c-.336-.448-.976-.688-1.632-.688-.8 0-1.456.432-1.456 1.168s.656 1.152 1.456 1.152zM52.856 18h-2.032v-7.728h2.032v1.04c.56-.672 1.504-1.232 2.464-1.232v1.984a2.595 2.595 0 0 0-.56-.048c-.672 0-1.568.384-1.904.88V18zm10.416 0h-2.048v-.816c-.528.64-1.44 1.008-2.448 1.008-1.232 0-2.672-.832-2.672-2.56 0-1.824 1.44-2.496 2.672-2.496 1.04 0 1.936.336 2.448.944v-.976c0-.784-.672-1.296-1.696-1.296-.816 0-1.584.32-2.224.912l-.8-1.424c.944-.848 2.16-1.216 3.376-1.216 1.776 0 3.392.704 3.392 2.928V18zm-3.68-1.184c.656 0 1.296-.224 1.632-.672v-.96c-.336-.448-.976-.688-1.632-.688-.8 0-1.456.432-1.456 1.168s.656 1.152 1.456 1.152zM69.464 18h-2.192l-3.104-7.728h2.176l2.016 5.376 2.032-5.376h2.176L69.464 18zm7.648.192c-2.352 0-4.128-1.584-4.128-4.064 0-2.24 1.664-4.048 4-4.048 2.32 0 3.872 1.728 3.872 4.24v.48h-5.744c.144.944.912 1.728 2.224 1.728.656 0 1.552-.272 2.048-.752l.912 1.344c-.768.704-1.984 1.072-3.184 1.072zm1.792-4.8c-.064-.736-.576-1.648-1.92-1.648-1.264 0-1.808.88-1.888 1.648h3.808zM84.36 18h-2.032V7.328h2.032V18zm15.232 0h-1.28l-6.224-8.512V18H90.76V7.328h1.36l6.144 8.336V7.328h1.328V18zm5.824.192c-2.352 0-3.824-1.824-3.824-4.064s1.472-4.048 3.824-4.048 3.824 1.808 3.824 4.048-1.472 4.064-3.824 4.064zm0-1.072c1.648 0 2.56-1.408 2.56-2.992 0-1.568-.912-2.976-2.56-2.976-1.648 0-2.56 1.408-2.56 2.976 0 1.584.912 2.992 2.56 2.992zm9.152.88h-1.312l-3.216-7.728h1.312l2.56 6.336 2.576-6.336h1.296L114.568 18zm10.496 0h-1.2v-.88c-.624.704-1.52 1.072-2.56 1.072-1.296 0-2.688-.88-2.688-2.56 0-1.744 1.376-2.544 2.688-2.544 1.056 0 1.936.336 2.56 1.04v-1.392c0-1.024-.832-1.616-1.952-1.616-.928 0-1.68.32-2.368 1.072l-.56-.832c.832-.864 1.824-1.28 3.088-1.28 1.648 0 2.992.736 2.992 2.608V18zm-3.312-.672c.832 0 1.648-.32 2.112-.96v-1.472c-.464-.624-1.28-.944-2.112-.944-1.136 0-1.92.704-1.92 1.68 0 .992.784 1.696 1.92 1.696zM20.119 20.455A12.184 12.184 0 0 1 11.5 24a12.18 12.18 0 0 1-9.333-4.319c4.772 3.933 11.88 3.687 16.36-.738a7.571 7.571 0 0 0 0-10.8c-3.018-2.982-7.912-2.982-10.931 0a3.245 3.245 0 0 0 0 4.628 3.342 3.342 0 0 0 4.685 0 1.114 1.114 0 0 1 1.561 0 1.082 1.082 0 0 1 0 1.543 5.57 5.57 0 0 1-7.808 0 5.408 5.408 0 0 1 0-7.714c3.881-3.834 10.174-3.834 14.055 0a9.734 9.734 0 0 1 .03 13.855zm.714-16.136C16.06.386 8.953.632 4.473 5.057a7.571 7.571 0 0 0 0 10.8c3.018 2.982 7.912 2.982 10.931 0a3.245 3.245 0 0 0 0-4.628 3.342 3.342 0 0 0-4.685 0 1.114 1.114 0 0 1-1.561 0 1.082 1.082 0 0 1 0-1.543 5.57 5.57 0 0 1 7.808 0 5.408 5.408 0 0 1 0 7.714c-3.881 3.834-10.174 3.834-14.055 0a9.734 9.734 0 0 1-.015-13.87C5.096 1.35 8.138 0 11.5 0c3.75 0 7.105 1.68 9.333 4.319z" fill-rule="evenodd"/>
</svg> --}}<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!-- Created with Inkscape (http://www.inkscape.org/) -->

<svg
xmlns:dc="http://purl.org/dc/elements/1.1/"
xmlns:cc="http://creativecommons.org/ns#"
xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
xmlns:svg="http://www.w3.org/2000/svg"
xmlns="http://www.w3.org/2000/svg"
xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
width="160"
height="36.715199"
id="svg2"
sodipodi:version="0.32"
inkscape:version="0.92.3 (2405546, 2018-03-11)"
sodipodi:docname="logovaslibre3.svg"
inkscape:output_extension="org.inkscape.output.svg.inkscape"
version="1.0">
<defs
  id="defs4">
 <inkscape:perspective
    sodipodi:type="inkscape:persp3d"
    inkscape:vp_x="0 : 382.5 : 1"
    inkscape:vp_y="0 : 1000 : 0"
    inkscape:vp_z="990 : 382.5 : 1"
    inkscape:persp3d-origin="495 : 255 : 1"
    id="perspective15" />
</defs>
<sodipodi:namedview
  id="base"
  pagecolor="#ffffff"
  bordercolor="#666666"
  borderopacity="1.0"
  inkscape:pageopacity="0.0"
  inkscape:pageshadow="2"
  inkscape:zoom="1.9477124"
  inkscape:cx="4.5319967"
  inkscape:cy="6.5722928"
  inkscape:document-units="px"
  inkscape:current-layer="layer1"
  inkscape:window-width="1600"
  inkscape:window-height="851"
  inkscape:window-x="0"
  inkscape:window-y="25"
  showguides="true"
  inkscape:guide-bbox="true"
  showgrid="false"
  inkscape:window-maximized="1" />
<metadata
  id="metadata7">
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
  inkscape:label="Capa 1"
  inkscape:groupmode="layer"
  id="layer1"
  style="display:inline"
  transform="translate(-174.55982,-267.33935)">
 <path
    style="fill:#000000;fill-opacity:1;fill-rule:evenodd;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
    d="m 507.13011,913.14006 c 0,-0.0328 0,-0.0657 0,0 z"
    id="path9408"
    inkscape:connector-curvature="0" />
 <g
    id="g71"
    transform="matrix(0.40086899,0,0,0.40086899,152.51468,171.1699)">
   <g
      id="g27">
     <path
        inkscape:connector-curvature="0"
        id="text2265"
        style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:122.50061798px;line-height:125%;font-family:Comics;text-align:start;writing-mode:lr-tb;text-anchor:start;display:inline;fill:#999999;fill-opacity:0.97752811;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
        d="m 100.01825,331.49146 63.62767,-84.36155 -38.72989,-5.27265 -23.05349,49.2109 -1.84429,-39.25152 -42.41845,2.9292 11.98782,67.37212 30.43063,9.3735 m 79.42642,-16.6532 c 13.92195,10.7985 28.0632,13.0267 47.57586,13.0267 24.00717,0 48.34323,-10.9699 48.34323,-29.7387 0,-34.70963 -49.65868,-24.25392 -49.65868,-29.65318 0,-8.74169 18.41647,-4.79932 28.94015,-1.62833 v -15.16944 c -11.51027,0.77137 -66.54044,-0.25704 -63.47104,20.56869 2.08282,13.62676 47.24702,10.19866 47.24702,23.99676 0,8.9131 -32.22883,5.9134 -43.08138,-4.5423 l -15.89516,23.1398 m 101.58347,-57.84938 2.63092,70.44768 60.51125,-2.0569 v -21.0829 l -30.91335,1.0285 6.57731,-50.90744 -38.80613,2.57106 m 74.5581,62.50918 c 5.38953,0 4.05801,-9.5308 3.86779,-20.6256 -0.12682,-10.5572 0.63406,-18.8661 -3.48734,-18.8661 -5.70656,0 -2.9801,8.2112 -3.0435,15.7381 1.26812,9.7262 -1.33154,23.7536 2.66305,23.7536 m 12.68721,-2.0039 c 1.90218,1.4174 20.03638,-6.0117 20.22661,-17.5465 0.12681,-5.2297 -2.40945,-3.91 -6.34064,-4.9364 5.64315,-2.9815 10.33523,-6.5494 9.57436,-10.1662 -1.45835,-6.50058 -18.76827,-6.50058 -25.04549,-5.81624 0,0 -0.95109,36.55914 1.58516,38.46534 m 5.1359,-22.9716 c 0.25363,-3.1282 -0.25361,-9.091 0.31704,-10.9972 1.90219,-0.0488 10.71567,0 11.34972,2.1994 1.01451,3.1282 -3.61416,5.0832 -11.66676,8.7978 m -0.19021,16.0801 c 0.0634,-3.2747 -0.25363,-7.8691 0,-10.1173 2.029,-1.564 7.73557,-3.0792 8.43304,-0.4398 1.14131,4.1054 -3.04352,8.8953 -8.43304,10.5571 m 48.13924,-19.9903 c 2.28262,7.8202 -15.40773,8.9932 -16.16861,11.9746 -0.44384,1.7108 3.9946,6.2073 9.38414,9.2376 4.18481,2.346 13.56894,5.2297 14.64685,1.8084 0.9511,-3.0303 -5.07251,-2.8348 -8.11601,-4.6921 -3.1703,-1.9551 -6.0236,-2.1505 -7.86238,-5.1808 8.94028,-3.177 15.34432,-5.4741 14.90048,-13.8808 -0.76088,-14.95601 -28.34261,-12.85432 -30.37161,-10.2639 -2.34603,2.9814 -1.52175,10.9482 -1.52175,17.8886 0,8.26 -0.95109,20.821 3.9312,20.821 4.2482,0 3.29712,-12.6099 3.29712,-20.7722 0,-5.3274 0.31703,-8.3578 0,-13.6852 6.53084,-2.346 15.66135,-0.8797 17.88057,6.7448 m 14.99955,23.1184 c 1.9656,1.7106 18.32441,-1.222 17.75376,-4.1056 -0.82428,-4.1545 -7.41854,-2.004 -12.42763,-1.7106 l -0.44385,-10.5084 c 4.69206,-0.391 11.66676,0.2932 10.65226,-3.6656 -0.82428,-3.177 -6.34063,-1.7108 -11.0961,-1.9551 v -11.2415 c 5.64315,-0.7331 11.79357,-0.8797 11.53994,-3.76345 -0.31702,-3.86115 -11.0961,-1.56402 -18.1976,-0.92863 -0.19022,5.42528 -0.19022,12.65888 -0.25363,19.64808 0,8.309 0.12682,16.178 2.47285,18.2308 m -296.41964,10.59532 c 5.44242,0.97481 4.88424,-3.38616 8.09387,-10.15849 0,0 13.39674,0 13.81539,0 2.5119,6.82363 1.95369,12.0055 5.86108,11.69766 6.27972,-0.46174 1.3955,-13.8525 -0.13954,-20.57351 -1.3955,-6.10535 -3.90739,-22.11268 -11.02443,-22.11268 -6.00061,0 -9.76846,13.28814 -12.48966,20.36829 -2.86077,7.38799 -7.88455,20.11177 -4.11671,20.77873 m 20.93242,-15.28904 h -11.44306 l 7.25657,-19.29086 4.18649,19.29086" />
     <g
        id="g22">
       <path
          id="path3584"
          style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:122.50061798px;line-height:125%;font-family:Comics;text-align:start;writing-mode:lr-tb;text-anchor:start;display:inline;fill:#ee8e00;fill-opacity:0.97752811;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
          d="m 97.41182,329.53664 63.62767,-84.36155 -38.72989,-5.27265 -23.05349,49.2109 -1.84429,-39.25152 -42.41844,2.9292 11.98782,67.37212 30.43062,9.3735 m 79.42642,-16.6532 c 13.92195,10.7985 28.0632,13.0267 47.57586,13.0267 24.00717,0 48.34323,-10.9699 48.34323,-29.7387 0,-34.70963 -49.65868,-24.25392 -49.65868,-29.65318 0,-8.74169 18.41647,-4.79932 28.94015,-1.62833 v -15.16944 c -11.51027,0.77137 -66.54044,-0.25704 -63.47104,20.56869 2.08282,13.62676 47.24702,10.19866 47.24702,23.99676 0,8.9131 -32.22883,5.9134 -43.08138,-4.5423 l -15.89516,23.1398 m 101.58347,-57.84938 2.63092,70.44768 60.51125,-2.0569 v -21.0829 l -30.91335,1.0285 6.57731,-50.90744 -38.80613,2.57106 m 74.5581,62.50918 c 5.38953,0 4.05801,-9.5308 3.86779,-20.6256 -0.12682,-10.5572 0.63406,-18.8661 -3.48734,-18.8661 -5.70656,0 -2.9801,8.2112 -3.0435,15.7381 1.26812,9.7262 -1.33154,23.7536 2.66305,23.7536 m 12.68721,-2.0039 c 1.90218,1.4174 20.03638,-6.0117 20.22661,-17.5465 0.12681,-5.2297 -2.40945,-3.91 -6.34064,-4.9364 5.64315,-2.9815 10.33523,-6.5494 9.57436,-10.1662 -1.45835,-6.50058 -18.76827,-6.50058 -25.04549,-5.81624 0,0 -0.95109,36.55914 1.58516,38.46534 m 5.1359,-22.9716 c 0.25363,-3.1282 -0.25361,-9.091 0.31704,-10.9972 1.90219,-0.0488 10.71567,0 11.34972,2.1994 1.01451,3.1282 -3.61416,5.0832 -11.66676,8.7978 m -0.19021,16.0801 c 0.0634,-3.2747 -0.25363,-7.8691 0,-10.1173 2.029,-1.564 7.73557,-3.0792 8.43304,-0.4398 1.14131,4.1054 -3.04352,8.8953 -8.43304,10.5571 m 48.13924,-19.9903 c 2.28262,7.8202 -15.40773,8.9932 -16.16861,11.9746 -0.44384,1.7108 3.9946,6.2073 9.38414,9.2376 4.18481,2.346 13.56894,5.2297 14.64685,1.8084 0.9511,-3.0303 -5.07251,-2.8348 -8.11601,-4.6921 -3.1703,-1.9551 -6.0236,-2.1505 -7.86238,-5.1808 8.94028,-3.177 15.34432,-5.4741 14.90048,-13.8808 -0.76088,-14.95601 -28.34261,-12.85432 -30.37161,-10.2639 -2.34603,2.9814 -1.52175,10.9482 -1.52175,17.8886 0,8.26 -0.95109,20.821 3.9312,20.821 4.2482,0 3.29712,-12.6099 3.29712,-20.7722 0,-5.3274 0.31703,-8.3578 0,-13.6852 6.53084,-2.346 15.66135,-0.8797 17.88057,6.7448 m 14.99955,23.1184 c 1.9656,1.7106 18.32441,-1.222 17.75376,-4.1056 -0.82428,-4.1545 -7.41854,-2.004 -12.42763,-1.7106 l -0.44385,-10.5084 c 4.69206,-0.391 11.66676,0.2932 10.65226,-3.6656 -0.82428,-3.177 -6.34063,-1.7108 -11.0961,-1.9551 v -11.2415 c 5.64315,-0.7331 11.79357,-0.8797 11.53994,-3.76345 -0.31702,-3.86115 -11.0961,-1.56402 -18.1976,-0.92863 -0.19022,5.42528 -0.19022,12.65888 -0.25363,19.64808 0,8.309 0.12682,16.178 2.47285,18.2308 m -296.41964,10.59532 c 5.44242,0.97481 4.88424,-3.38616 8.09387,-10.15849 0,0 13.39674,0 13.81539,0 2.5119,6.82363 1.95369,12.0055 5.86108,11.69766 6.27972,-0.46174 1.3955,-13.8525 -0.13954,-20.57351 -1.3955,-6.10535 -3.90739,-22.11268 -11.02443,-22.11268 -6.00061,0 -9.76846,13.28814 -12.48966,20.36829 -2.86077,7.38799 -7.88455,20.11177 -4.11671,20.77873 m 20.93242,-15.28904 h -11.44306 l 7.25657,-19.29086 4.18649,19.29086"
          inkscape:connector-curvature="0" />
     </g>
   </g>
 </g>
</g>
<g
  inkscape:groupmode="layer"
  id="layer2"
  inkscape:label="Capa 2"
  style="display:inline"
  transform="translate(-174.55982,-267.33935)" />
</svg>