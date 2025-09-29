document.addEventListener('DOMContentLoaded', () => {
    const videoListContainer = document.getElementById('video-list');
    const videoPlayer = document.getElementById('video-player');
    const videoPlayerContainer = document.getElementById('video-player-container');
    const videoPlaceholder = document.getElementById('video-placeholder');
    const videoTitle = document.getElementById('video-title');
    const videoDescription = document.getElementById('video-description');
    let activeVideoLink = null;

    // Fetch video data and build the UI
    fetch('scan.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                videoListContainer.innerHTML = `<p class="text-red-500 p-4">${data.error}</p>`;
                return;
            }
            // Start building the list from the root's children
            const listHtml = createList(data.children);
            videoListContainer.innerHTML = `<h3 class="px-2 pt-4 pb-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">My Videos</h3>${listHtml}`;
            attachEventListeners();
        })
        .catch(error => {
            console.error('Error fetching video data:', error);
            videoListContainer.innerHTML = `<p class="text-red-500 p-4">Failed to load video list. See console for details.</p>`;
        });

    // Recursively creates the HTML for folders and files
    function createList(items) {
        let html = '';
        items.forEach(item => {
            if (item.type === 'folder') {
                html += `
                    <details class="group">
                        <summary class="flex items-center px-2 py-2 text-sm font-medium rounded-lg hover:bg-primary/20 dark:hover:bg-primary/20 text-gray-900 dark:text-white cursor-pointer">
                            <svg class="w-5 h-5 mr-2 text-gray-400 group-open:rotate-90 transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            ${item.name}
                        </summary>
                        <div class="pl-4">
                            ${createList(item.children)}
                        </div>
                    </details>
                `;
            } else if (item.type === 'file') {
                html += `
                    <a href="#" data-video-path="videos/${item.path}" data-video-name="${item.name}" class="video-link group flex items-center px-2 py-2 text-sm font-medium rounded-lg hover:bg-primary/20 dark:hover:bg-primary/20 text-gray-900 dark:text-white">
                        ${item.name.replace(/\.[^/.]+$/, "")}
                    </a>
                `;
            }
        });
        return html;
    }

    // Attach click handlers to the generated video links
    function attachEventListeners() {
        const videoLinks = document.querySelectorAll('.video-link');
        videoLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const videoPath = link.dataset.videoPath;
                const videoName = link.dataset.videoName;
                playVideo(videoPath, videoName, link);
            });
        });
    }

    // Function to play a selected video
    function playVideo(path, name, linkElement) {
        // Hide placeholder and show player
        videoPlaceholder.style.display = 'none';
        videoPlayer.style.display = 'block';

        // Set video source and play
        videoPlayer.src = path;
        videoPlayer.play();

        // Update title and description
        const cleanName = name.replace(/\.[^/.]+$/, "").replace(/_/g, ' ');
        videoTitle.textContent = cleanName;
        videoDescription.textContent = `Now playing: ${name}`;

        // Update active link styling
        if (activeVideoLink) {
            activeVideoLink.classList.remove('bg-primary', 'text-white');
        }
        linkElement.classList.add('bg-primary', 'text-white');
        activeVideoLink = linkElement;
    }
});