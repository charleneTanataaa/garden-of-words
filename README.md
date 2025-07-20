<p align="center">
  <img src="public/images/main_logo.png" alt="Garden" width="300">
</p>

# Garden of Words 
We’re a small project with a big mission: to help people write more and scroll less. Whether it’s journaling, storytelling, or just getting your thoughts out, we’re here to make writing easy, fun, and part of your daily routine.

With a sprinkle of sunshine and a garden full of prompts, we’re helping writing habits take root, turning “I should write more” into “I’m blooming with ideas!”

## Instalation 🚀
1. Clone the project using the link provided by Github.
```bash
git clone https://github.com/charleneTanataaa/garden-of-words.git
```
2. Open the terminal in your root directory of Garden of Words.
```bash
cd garden-of-words
```
3. Install dependencies.
```bash
composer install
npm install
npm run build
```
4. Create .env file.
```bash
cp .env.example .env.
```
5. Generate the application key.
```bash
php artisan key:generate
```
6. Set up database in .env file and make sure MySQL is on.
```bash
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
7. Run migrations and seeders.
```bash
php artisan migrate --seed.
```
8. Start server.
```bash
php artisan serve
```

## Usage ⚒️
- Visit the app at http://localhost:8000. 
- Register a new account or login using seeder account:
  - username = testuser1
  - password = password.
- Start writing and watch your garden grow!!!

## Features 📦
- Home Page: A simple introduction and links to sign up!
- About us: Learn more about the motivation and how the app works.
- Sign Up and Login: Create an account with:
  - Email 
  - Username
  - Password 
  - Flower of your choice. 
- Daily writing: Write a letter every day to grow your flower (You can choose the color of your letter.)
- Garden view: Track all the flowers that you've grown
- Letters consists of:
  - Title
  - Content
  - Color of your choice (We have 9 pretty colors to choose from)
  - Public/Private (Choose whether or not to share your letters with the community!)
- Search, Sort, & Filter: Easily find letters by date and titles
- Pagination: Browse all your letters page by page.
- Write, update, and delete: You can write, update, and delete your letters.
- Community Letters: Public letters shared by users.

## Tech Stack 🖥️
- Laravel
- MySQL
- Blade
- Bootstrap

## Contributing 🦸
Contributions are welcome! If you have suggestions, bug fixes, or new features, feel free to open an issue or submit a pull request.

