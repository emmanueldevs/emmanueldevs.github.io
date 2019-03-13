self.addEventListener('fetch', function(event) {
  event.respondWith(caches.open('cache').then(function(cache) {
    return cache.match(event.request).then(function(response) {
      console.log("cache request: " + event.request.url);
       var fetchPromise = fetch(event.request).then(function(networkResponse) {
// if we got a response from the cache, update the cache
console.log("fetch completed: " + event.request.url, networkResponse);
  if (networkResponse) {
    console.debug("updated cached page: " + event.request.url, networkResponse);
      cache.put(event.request, networkResponse.clone());}
        return networkResponse;
          }, function (event) {
// rejected promise - just ignore it, we're offline!
          console.log("Error in fetch()", event);
          event.waitUntil(
          caches.open('cache').then(function(cache) { // our cache here is named *cache* in the caches.open()
          return cache.addAll
          ([
            '/', // do not remove this
            '/index.html', //default
            '/index.html?homescreen=1', //default
            '/?homescreen=1', //default
            '/css/font-face.css',//css files
            '/assets/icons/font-awesome-4.7.0/css/font-awesome.min.css',
            '/assets/plugins/css/bootstrap.min.css',
            '/assets/plugins/css/animate.css',
            '/assets/plugins/css/owl.css',
            '/assets/plugins/css/jquery.fancybox.min.css',
            '/assets/css/styles.css'
            '/assets/css/responsive.css'//end of css files
            '/assets/images/ab-img.png',//images to keep offline
            '/images/emmanuel.png',
            '/assets/images/ab-img.png',
            '/assets/images/me.png',
            '/assets/images/home-bg-img.jpg',
            '/assets/images/map-color-overlay.png',
            '/assets/images/header.jpg',
            '/images/portfolio/ask_sirius.png',
            '/images/portfolio/crypt_mobile.png',
            '/images/portfolio/crypt.png',
            '/images/portfolio/e_memory.png',
            '/images/portfolio/e_stitches.png',
            '/images/portfolio/hymnary.png',
            '/images/ask_sirius/ask_sirius.png',
            '/images/ask_sirius/ask_sirius2.png',
            '/images/crypt/crypt.png',
            '/images/e_memory/e_memory3.png',
            '/images/e_memory/e_memory4.png',
            '/images/e_stitches/e_stitches.png',
            '/images/e_stitches/e_stitches5.png',
            '/images/hymnary/hymnary4.png',
            '/images/hymnary/hymnary7.png',
            '/images/icons/ab-img-72x72.png',
            '/images/icons/ab-img-96x96.png',
            '/images/icons/ab-img-128x128.png',
            '/images/icons/ab-img-144x144.png',
            '/images/icons/ab-img-152x152.png',
            '/images/icons/ab-img-192x192.png',
            '/images/icons/ab-img-384x384.png',
            '/images/icons/ab-img-512x512.png',//end of images
            '/assets/plugins/js/jquery.min.js',//js files
            '/assets/plugins/js/popper.min.js',
            '/assets/plugins/js/bootstrap.min.js',
            '/assets/plugins/js/owl.carousel.js',
            '/assets/plugins/js/validator.min.js',
            '/assets/plugins/js/wow.min.js',
            '/assets/plugins/js/jquery.mixitup.min.js',
            '/assets/plugins/js/jquery.nav.js',
            '/assets/plugins/js/jquery.fancybox.min.js',
            '/assets/plugins/js/isotope.pkgd.js',
            '/assets/plugins/js/packery-mode.pkgd.js',
            '/assets/js/custom-scripts.js',//end of js files
            // Do not delete manifest.js path below
            '/manifest.js',
            //These are links to the extenal social media buttons that should be cached; we have used twitter's as an example
            'https://platform.twitter.com/widgets.js',
            'http://fonts.googleapis.com/css?family=Roboto',
          ]);
        })
        );
        });
// respond from the cache, or the network
  return response || fetchPromise;
});
}));
});

self.addEventListener('install', function(event) {
    // The promise that skipWaiting() returns can be safely ignored.
    self.skipWaiting();
    console.log("Latest version installed!");
});
