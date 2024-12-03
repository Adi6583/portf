<?php
require_once 'config.php';
require_once 'functions.php';

$projects = getProjects($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Name - Portfolio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="custom-cursor"></div>
    <header>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <button id="dark-mode-toggle">🌓</button>
    </header>
    <main>
        <section id="home" class="hero">
            <h1>Your Name</h1>
            <p>Web Developer & Designer</p>
        </section>
        <section id="about">
            <h2>About Me</h2>
            <p>A passionate web developer with a keen eye for design and a love for creating unique digital experiences.</p>
        </section>
        <section id="skills">
            <h2>Skills</h2>
            <ul class="skill-list">
                <li>HTML</li>
                <li>CSS</li>
                <li>JavaScript</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>React</li>
                <li>Node.js</li>
            </ul>
        </section>
        <section id="projects">
            <h2>Projects</h2>
            <div class="project-grid">
                <?php foreach ($projects as $project): ?>
                    <div class="project-card">
                        <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                        <div class="content">
                            <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                            <p><?php echo htmlspecialchars($project['description']); ?></p>
                            <a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank">View Project</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section id="contact">
            <h2>Contact Me</h2>
            <form id="contact-form" action="submit_form.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Your Name. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>

