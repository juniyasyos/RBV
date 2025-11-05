/**
 * Main JavaScript untuk Ruang Baca Virtual
 */

// Toggle User Dropdown
function toggleUserDropdown() {
  const userMenu = document.getElementById('userMenu');
  if (userMenu) {
    userMenu.style.display = userMenu.style.display === 'block' ? 'none' : 'block';
  }
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
  const userIcon = document.querySelector('.user-icon');
  const userMenu = document.getElementById('userMenu');

  if (userMenu && userIcon && !userIcon.contains(event.target)) {
    userMenu.style.display = 'none';
  }
});

// Toggle Berita Dropdown (Mobile)
function toggleDropdown() {
  const dropdownContent = event.target.nextElementSibling;
  if (dropdownContent) {
    const isVisible = dropdownContent.style.display === 'block';
    dropdownContent.style.display = isVisible ? 'none' : 'block';
  }
}

// Fade-in animation on scroll
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('fade-in');
      observer.unobserve(entry.target);
    }
  });
}, observerOptions);

// Observe all elements with fade-in class
document.addEventListener('DOMContentLoaded', function() {
  const fadeElements = document.querySelectorAll('.fade-in');
  fadeElements.forEach(el => observer.observe(el));
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });
});
