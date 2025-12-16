
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Tv</title>
    <script src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js"></script>
    <style>
:root {
    --primary-color: #3a86ff;
    --hover-color: #2667cc;
    --bg-color: #121212;
    --text-color: #e0e0e0;
    --border-color: #333333;
    --card-bg: #1e1e1e;
    --tab-bg: #2d2d2d;
    --tab-active-bg: #3a86ff;
    --image-border: #444444;
    --scrollbar-color: #43464a;
    --scrollbar-bg: transparent;
}

body {
    font-family: 'Roboto', Arial, sans-serif;
    background-color: var(--bg-color);
    margin: 0;
    padding: 20px;
    color: var(--text-color);
}

.app-container {
    display: flex;
    max-width: 1863px;
    margin: 0 auto;
    gap: 20px;
}

#player-container {
    flex: 2;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    display: flex;
    max-width: 1863px;
    margin: auto;
    gap: 20px;
    align-items: center;
    justify-content: center;
    flex-direction: column; /* Stack elements vertically */
    width: 100%;
}

#player {
    width: 100%;
    height: 0;
    padding-bottom: 56.25%;
    position: relative;
    background: #000;
}

#player > div {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.playlist-container {
    flex: 1;
    display: flex;
    flex-direction: column;
    background: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    max-height: 69vh;
    border: 1px solid var(--border-color);
}

/* Redesigned Category Tabs */
.category-tabs-container {
    position: relative;
    background: var(--card-bg);
    z-index: 10;
    border-bottom: 1px solid var(--border-color);
}

.category-tabs-scroll {
    overflow-x: auto;
    scrollbar-width: thin;
    scrollbar-color: var(--scrollbar-color) var(--scrollbar-bg);
    white-space: nowrap;
    padding: 0 16px;
    display: flex;
    mask-image: linear-gradient(
        to right,
        transparent,
        black 16px,
        black calc(100% - 16px),
        transparent
    );
}

.category-tabs-scroll::-webkit-scrollbar {
    height: 4px;
}

.category-tabs-scroll::-webkit-scrollbar-track {
    background: var(--scrollbar-bg);
}

.category-tabs-scroll::-webkit-scrollbar-thumb {
    background-color: var(--scrollbar-color);
    border-radius: 2px;
}

.category-tabs {
    display: inline-flex;
    gap: 4px;
    padding: 0;
    position: relative;
    margin: 0 auto;
}

.category-tab {
    padding: 14px 20px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
    color: #a0a0a0;
    position: relative;
    border: none;
    background: transparent;
    white-space: nowrap;
    transform: translateY(0);
}

.category-tab:hover {
    color: var(--text-color);
    transform: translateY(-2px);
}

.category-tab.active {
    color: var(--primary-color);
    font-weight: 600;
}

.category-tab.active::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 20%;
    right: 20%;
    height: 3px;
    background: var(--primary-color);
    border-radius: 2px 2px 0 0;
    transition: all 0.3s ease;
}

/* Channels Grid */
.channels-container {
    flex-grow: 1;
    overflow-y: auto;
    padding: 16px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 12px;
    align-content: flex-start;
}

.channels-container::-webkit-scrollbar {
    width: 8px;
}

.channels-container::-webkit-scrollbar-track {
    background: var(--card-bg);
}

.channels-container::-webkit-scrollbar-thumb {
    background: #444;
    border-radius: 4px;
}

.channels-container::-webkit-scrollbar-thumb:hover {
    background: #555;
}

/* Channel Cards */
.channel-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 12px;
    cursor: pointer;
    border-radius: 8px;
    transition: all 0.2s;
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    text-align: center;
    height: 104px140px;
    box-sizing: border-box;
}

.channel-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    background: #2a2a2a;
}

.channel-card.active {
    border: 2px solid var(--primary-color);
    background-color: #2a3a4d;
}

.channel-card img {
    width: 53px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    object-position: center;
    margin-bottom: 10px;
    border: 2px solid var(--image-border);
    transition: transform 0.3s ease;
}

.channel-card:hover img {
    transform: scale(1.05);
}

.channel-info {
    width: 100%;
    overflow: hidden;
}

.channel-name {
    font-weight: 500;
    font-size: 14px;
    margin-bottom: 4px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: var(--text-color);
}

.channel-category {
    font-size: 12px;
    color: #a0a0a0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .app-container {
        flex-direction: column;
    }
    
    #player-container {
        width: 100%;
    }
    
    .channels-container {
        grid-template-columns: repeat(auto-fill, minmax(110px, 1fr));
    }
    
    .category-tab {
        padding: 12px 16px;
    }
}

@media (max-width: 768px) {
    .channels-container {
        grid-template-columns: repeat(auto-fill, minmax(90px, 1fr));
    }
    
    .channel-card {
        height: 120px;
        padding: 8px;
    }
    
    .channel-card img {
        width: 60px;
        height: 60px;
    }
    
    .channel-name {
        font-size: 12px;
    }
    
    .channel-category {
        font-size: 10px;
    }
    
    .category-tab {
        padding: 10px 14px;
        font-size: 13px;
    }
}

@media (max-width: 480px) {
    body {
        padding: 10px;
    }
    
    .channels-container {
        grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
    }
    
    .channel-card {
        height: 110px;
    }
    
    .channel-card img {
        width: 50px;
        height: 50px;
    }
    
    .category-tab {
        padding: 8px 12px;
        font-size: 12px;
    }
    
    .category-tab.active::after {
        left: 15%;
        right: 15%;
    }
}




/* For smaller screens (like mobile devices) */
@media (max-width: 768px) {
    .app-container {
        margin-top: 100px; /* Adjust as needed */
    }
}

/* For even smaller screens */
@media (max-width: 480px) {
    .app-container {
        margin-top: 50px; /* Adjust as needed */
    }
}



    </style>
</head>
<body>
    <div class="app-container" >
    <div id="player-container">
        <div id="player" style="position: relative;">
            <div id="overlay-message" style="
                display: none;
                position: absolute;
                top: 0; left: 0;
                width: 100%; height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
                color: white;
                font-size: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 10;
                text-align: center;
            ">
                ১০ সেকেন্ড অপেক্ষা করুন চ্যানেল টি চালু হচ্ছে...
            </div>
        </div>
    </div>
    
        <div class="playlist-container">
            <div class="category-tabs-container">
                <div class="scroll-button left"></div>
                <div class="category-tabs-scroll">
                    <div class="category-tabs" id="category-tabs"></div>
                </div>
                <div class="scroll-button right"></div>
            </div>
            <div class="channels-container" id="channels-container"></div>
        </div>
    </div>
    
    <!-- Copyright Footer -->
    <footer style="text-align: center; margin-top: 30px; padding: 10px; ">
        <p>&copy; MZTV</p>
    </footer>
    

<script>
    // Initialize Clappr player
    var player = new Clappr.Player({
        source: "F92YWxIZTO0UOezeus/fet-1/playlist.m3u8",
        parentId: "#player",
        autoPlay: true,
        mute: false,
        height: '100%',
        width: '100%',
        disableVideoTagContextMenu: true,
    });

    // Function to change channel with retry logic
    function changeChannel(url, channelCard) {
        const overlayMessage = document.getElementById('overlay-message');
        overlayMessage.textContent = '১০ সেকেন্ড অপেক্ষা করুন চ্যানেল টি চালু হচ্ছে......';
        overlayMessage.style.display = 'flex';

        player.load(url);

        let streamStarted = false;
        const maxRetryDuration = 60000; // 60 seconds
        const retryStartTime = Date.now();

        // Remove previous listeners to avoid stacking
        player.off(Clappr.Events.PLAYER_ERROR);
        player.off(Clappr.Events.PLAYER_PLAY);

        // On successful play
        player.once(Clappr.Events.PLAYER_PLAY, function () {
            streamStarted = true;
            overlayMessage.style.display = 'none';
        });

        // On error, retry for 60 seconds
        player.on(Clappr.Events.PLAYER_ERROR, function (error) {
            if (streamStarted) return;

            const elapsed = Date.now() - retryStartTime;
            if (elapsed < maxRetryDuration) {
                console.warn("Stream error, retrying...", error);
                setTimeout(() => player.load(url), 2000); // retry every 2s
            } else {
                overlayMessage.textContent = 'Error: Stream not available. Please try another channel.';
            }
        });

        // Call backend to notify play attempt
        const streamName = url.split('/')[3];
        fetch(`http://103.60.172.71:90/play-channel/${streamName}`)
            .then(response => response.json())
            .then(data => console.log("Play-channel API response:", data))
            .catch(error => console.error("Error calling play-channel API:", error));

        // Highlight the active channel card
        document.querySelectorAll('.channel-card').forEach(card => {
            card.classList.remove('active');
        });
        channelCard.classList.add('active');

        // Scroll to selected card
        channelCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    // Scrollable tab setup
    function setupTabScrolling() {
        const tabsContainer = document.querySelector('.category-tabs-scroll');
        const leftButton = document.querySelector('.scroll-button.left');
        const rightButton = document.querySelector('.scroll-button.right');

        leftButton.addEventListener('click', () => {
            tabsContainer.scrollBy({ left: -200, behavior: 'smooth' });
        });

        rightButton.addEventListener('click', () => {
            tabsContainer.scrollBy({ left: 200, behavior: 'smooth' });
        });

        tabsContainer.addEventListener('scroll', () => {
            const scrollLeft = tabsContainer.scrollLeft;
            const scrollWidth = tabsContainer.scrollWidth;
            const clientWidth = tabsContainer.clientWidth;

            leftButton.style.display = scrollLeft > 0 ? 'flex' : 'none';
            rightButton.style.display = scrollLeft < (scrollWidth - clientWidth - 1) ? 'flex' : 'none';
        });

        tabsContainer.dispatchEvent(new Event('scroll'));
    }

    // Show channels under selected category
    function showChannels(categoryName, channels) {
        const channelsContainer = document.getElementById('channels-container');
        channelsContainer.innerHTML = '';

        channels.forEach(channel => {
            const channelCard = document.createElement('div');
            channelCard.className = 'channel-card';
            channelCard.onclick = () => changeChannel(channel.url, channelCard);

            channelCard.innerHTML = `
                <img src="${channel.image}" alt="${channel.channel_name}">
                <div class="channel-info">
                    <div class="channel-name">${channel.channel_name}</div>
                    <div class="channel-category">${categoryName}</div>
                </div>
            `;

            channelsContainer.appendChild(channelCard);
        });

        // Auto-select the first channel
        if (channels.length > 0) {
            const firstChannelCard = channelsContainer.querySelector('.channel-card');
            changeChannel(channels[0].url, firstChannelCard);
        }
    }

    // Fetch categories and channels
    fetch('http://103.60.172.71:90/tv-server')
        .then(response => response.json())
        .then(data => {
            const categoryTabs = document.getElementById('category-tabs');
            let firstCategory = true;

            for (const category in data) {
                if (data.hasOwnProperty(category)) {
                    const tab = document.createElement('div');
                    tab.className = 'category-tab';
                    if (firstCategory) {
                        tab.classList.add('active');
                        firstCategory = false;
                    }
                    tab.textContent = category.charAt(0).toUpperCase() + category.slice(1);

                    tab.addEventListener('click', function () {
                        document.querySelectorAll('.category-tab').forEach(t => t.classList.remove('active'));
                        this.classList.add('active');
                        showChannels(category, data[category]);
                    });

                    categoryTabs.appendChild(tab);
                }
            }

            // Auto-select first category
            if (Object.keys(data).length > 0) {
                const firstCategoryKey = Object.keys(data)[0];
                showChannels(firstCategoryKey, data[firstCategoryKey]);
            }

            setupTabScrolling();
        })
        .catch(error => {
            console.error('Error fetching playlist:', error);
            document.getElementById('channels-container').innerHTML =
                '<div style="padding: 20px; text-align: center; color: #606060;">Error loading channels. Please try again later.</div>';
        });
</script>

      <script>
    (function() {
        const devtools = { open: false };

        const threshold = 160;
        const check = () => {
            const start = new Date();
            debugger;  // DevTools trap
            const end = new Date();
            if (end - start > threshold) {
                devtools.open = true;
                window.location.href = "https://www.google.com"; // redirect or show a warning page
            } else {
                devtools.open = false;
            }
        };

        setInterval(check, 1000);
    })();
</script>



<script>
    // Disable right-click
    document.addEventListener('contextmenu', event => event.preventDefault());

    // Disable F12, Ctrl+Shift+I, Ctrl+Shift+J, Ctrl+U
    document.onkeydown = function(e) {
        if (
            e.keyCode === 123 || // F12
            (e.ctrlKey && e.shiftKey && e.keyCode === 73) || // Ctrl+Shift+I
            (e.ctrlKey && e.shiftKey && e.keyCode === 74) || // Ctrl+Shift+J
            (e.ctrlKey && e.keyCode === 85) // Ctrl+U
        ) {
            return false;
        }
    };
</script>


</body>
</html>
