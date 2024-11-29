CREATE DATABASE quiz_app;

USE quiz_app;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    score INT NOT NULL,
    time_taken DATETIME NOT NULL,
    has_taken BOOLEAN DEFAULT FALSE
);

CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    option_a VARCHAR(100) NOT NULL,
    option_b VARCHAR(100) NOT NULL,
    option_c VARCHAR(100) NOT NULL,
    option_d VARCHAR(100) NOT NULL,
    correct_option CHAR(1) NOT NULL
);

INSERT INTO questions (question, option_a, option_b, option_c, option_d, correct_option) 
VALUES 
('How many continents are there in the world?', '6', '7', '8', '9', 'B'),
('Which horoscope sign is a fish?', 'Aquarius', 'Cancer', 'Pisces', 'Gemini', 'C'),
('Our solar system is located in what galaxy?', 'Andromeda Galaxy', 'Cigar Galaxy', 'Black Eye Galaxy', 'Milky Way Galaxy', 'D'),
('What type of fish is Nemo?', 'Clownfish', 'White Marlin', 'Burbot', 'Catfish', 'A'),
('What is the chemical symbol for gold?', 'Au', 'Ag', 'Go', 'Gd', 'A'),
('What is the largest ocean on Earth?', 'Atlantic Ocean', 'Indian Ocean', 'Arctic Ocean', 'Pacific Ocean', 'D'),
('Which planet is known as the Red Planet?', 'Venus', 'Mars', 'Neptune', 'Saturn', 'B'),
('Who painted the Mona Lisa?', 'Vincent van Gogh', 'Leonardo da Vinci', 'Pablo Picasso', 'Claude Monet', 'B'),
('What does HTTP stand for in web addresses?', 'HyperText Markup Protocol', 'HyperText Transfer Protocol', 'HyperTool Transfer Platform', 'HyperTransfer Technology Protocol', 'B'),
('Which is the longest river in the world?', 'Amazon River', 'Yangtze River', 'Mississippi River', 'Nile River', 'D');