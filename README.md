# LearnSmart E-learning System MVP

**LearnSmart** is an adaptive e-learning platform designed to provide personalized educational content based on user preferences, learning styles, and progress. This Minimum Viable Product (MVP) focuses on core features such as user classification, content management, YouTube video integration, and analytics.

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Technology Stack](#technology-stack)
- [Installation](#installation)
- [API Endpoints](#api-endpoints)
- [Data Model](#data-model)
- [User Stories](#user-stories)
- [Contributing](#contributing)
- [License](#license)

## Introduction
The LearnSmart MVP provides an interactive and personalized learning experience by dynamically adjusting content based on users' learning styles. With integrated YouTube video support and detailed progress tracking, learners receive content recommendations tailored to their unique needs.

## Features
- **User Classification**: Classifies users based on their learning styles and preferences.
- **Personalized Content**: Delivers content from the Learning Repository and YouTube based on classification and progress.
- **YouTube API Integration**: Fetches relevant educational videos for learners.
- **Progress Tracking**: Tracks learners' progress to optimize future content delivery.
- **Admin Panel**: Manage the content repository and analyze user interactions.
- **LMS Analytics Tool**: Provides detailed reports on user engagement and content performance.

## Technology Stack
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: Node.js, Express
- **Database**: MySQL/PostgreSQL
- **APIs**: YouTube Data API, LearnSmart Custom APIs
- **Frameworks**: 
  - Frontend: React/Vue.js (optional)
  - Backend: Express.js
- **Analytics**: LMS Analytics Tool (custom analytics module)

## Installation

### Prerequisites
- Node.js and npm
- MySQL or PostgreSQL
- YouTube Data API Key

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/LearnSmart.git
   cd LearnSmart
   ```

2. Install dependencies:
   ```bash
   npm install
   ```

3. Set up the database:
   - Create a MySQL/PostgreSQL database named `learnsmart_db`.
   - Run the SQL migration scripts located in `/database/migrations`.

4. Configure environment variables:
   - Create a `.env` file in the root directory:
     ```bash
     DB_HOST=localhost
     DB_USER=root
     DB_PASS=yourpassword
     DB_NAME=learnsmart_db
     YOUTUBE_API_KEY=your-youtube-api-key
     ```

5. Start the server:
   ```bash
   npm start
   ```

6. Access the app at `http://localhost:3000`.

## API Endpoints

### User Classification
- **POST** `/api/classify_user`
  - Classifies users based on interaction data.
  - **Params**: `user_id`, `interaction_data`

### Get Content
- **GET** `/api/get_content`
  - Retrieves educational content for the user.
  - **Params**: `user_id`, `classification_type`

### Get YouTube Videos
- **GET** `/api/get_youtube_videos`
  - Fetches educational videos based on user classification.
  - **Params**: `user_id`, `classification_type`, `search_terms` (optional)

### Update Progress
- **POST** `/api/update_progress`
  - Updates the user’s progress.
  - **Params**: `user_id`, `progress_data`

### Analyze Usage
- **GET** `/api/analyze_usage`
  - Provides insights into user engagement.
  - **Params**: `date_range`, `user_id` (optional)

## Data Model

### Key Entities
- **Users**: Stores user profiles and classifications.
  - `user_id`, `name`, `email`, `classification_type`, `progress`, `preferences`
- **Content**: Stores educational content.
  - `content_id`, `title`, `type`, `format`, `difficulty_level`, `classification_type`
- **YouTube Videos**: Stores video metadata.
  - `video_id`, `title`, `url`, `classification_type`, `duration`, `description`
- **Interactions**: Logs user interactions with content and videos.
  - `interaction_id`, `user_id`, `content_id`, `video_id`, `timestamp`, `interaction_type`

## User Stories

### Learners
- "As a learner, I want to receive content based on my learning style so I can improve my learning outcomes."
- "As a learner, I want to track my progress to understand how I am improving."

### Administrators
- "As an administrator, I want to manage the content repository to ensure it stays up to date."
- "As an administrator, I want to analyze user engagement data to improve content delivery."

### Educators
- "As an educator, I want to view analytics to optimize how learning materials are presented."

### Recruiters
- "As a recruiter, I want to explore a demo mode without creating an account."

## Contributing
We welcome contributions! To contribute:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature-name`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature-name`).
5. Open a pull request.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
