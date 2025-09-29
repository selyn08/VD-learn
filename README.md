# Video Learning Platform

This is a simple web application that scans a local directory for video files and presents them in a clean, course-like interface for easy browsing and viewing. It's built with PHP, vanilla JavaScript, and Tailwind CSS, and can be run easily using Docker.

## Features

-   **Recursive Directory Scanning**: Automatically finds videos in a specified folder and its subfolders.
-   **Udemy-like Interface**: Displays folders as collapsible sections and videos as lessons.
-   **Embedded Video Player**: Plays videos directly in the browser without page reloads.
-   **Dynamic Content**: The video list is generated dynamically on page load.
-   **Dockerized**: Comes with `Dockerfile` and `docker-compose.yml` for one-command setup.

## Running with Docker

This is the recommended way to run the application.

### Prerequisites

-   [Docker](https://docs.docker.com/get-docker/)
-   [Docker Compose](https://docs.docker.com/compose/install/) (usually included with Docker Desktop)

### Instructions

1.  **Add Your Videos**: Place your video files (e.g., `.mp4`, `.webm`, `.mov`) inside the `videos` directory. You can create any folder structure you like inside it.

    ```
    videos/
    ├── 01-Introduction/
    │   ├── 01-Welcome.mp4
    │   └── 02-Setup.mp4
    └── 02-Advanced-Topics/
        └── 01-Deep-Dive.mp4
    ```

2.  **Build and Run the Container**: Open your terminal in the project root and run the following command:

    ```bash
    sudo docker compose up --build -d
    ```

3.  **Access the Application**: Open your web browser and navigate to:

    [http://localhost:8000](http://localhost:8000)

The application will be running, and you should see the video structure from your `videos` directory in the sidebar. Any changes you make to the `videos` directory on your local machine will be reflected inside the application.

To stop the application, run:
```bash
sudo docker compose down
```