<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<title>Video Library</title>
<link href="data:image/x-icon;base64," rel="icon" type="image/x-icon"/>
<link crossorigin="" href="https://fonts.gstatic.com/" rel="preconnect"/>
<link as="style" href="https://fonts.googleapis.com/css2?display=swap&amp;family=Inter:wght@400;500;700;900&amp;family=Noto+Sans:wght@400;500;700;900" onload="this.rel='stylesheet'" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#1173d4",
            "background-light": "#f6f7f8",
            "background-dark": "#101922",
          },
          fontFamily: {
            "display": ["Inter"]
          },
          borderRadius: {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
        },
      },
    }
  </script>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200">
<div class="flex h-screen">
<aside class="w-80 flex flex-col bg-background-light dark:bg-background-dark border-r border-gray-200 dark:border-gray-800">
<div class="p-4">
<div class="relative">
<span class="absolute inset-y-0 left-0 flex items-center pl-3">
<svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
<path clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" fill-rule="evenodd"></path>
</svg>
</span>
<input class="w-full pl-10 pr-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700/50 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Search videos" type="text"/>
</div>
</div>
<nav id="video-list" class="flex-1 px-2 space-y-1"></nav>
</aside>
<main class="flex-1 flex flex-col overflow-hidden">
<div class="flex-1 p-6">
<div class="max-w-4xl mx-auto">
<div id="video-player-container" class="relative aspect-video rounded-xl overflow-hidden shadow-lg bg-black">
    <video id="video-player" class="w-full h-full" controls>
        <!-- The video source will be set by JavaScript -->
    </video>
    <div id="video-placeholder" class="absolute inset-0 bg-black/30 flex items-center justify-center">
        <div class="text-center text-white">
            <h2 class="text-2xl font-bold">Select a video to play</h2>
            <p class="mt-2 text-gray-300">Choose a lesson from the sidebar to begin.</p>
        </div>
    </div>
</div>
<div class="mt-6">
<h1 id="video-title" class="text-3xl font-bold text-gray-900 dark:text-white">Welcome</h1>
<p id="video-description" class="mt-2 text-gray-600 dark:text-gray-300">
              Please select a video from the list on the left.
            </p>
</div>
</div>
</div>
</main>
</div>
<script src="js/app.js"></script>
</body></html>