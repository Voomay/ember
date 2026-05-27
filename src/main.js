document.addEventListener('DOMContentLoaded', () => {
  // Mobile Nav (Placeholder behavior)
  const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
  const navLinks = document.querySelector('.nav-links');
  if(mobileMenuBtn && navLinks) {
    mobileMenuBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      mobileMenuBtn.classList.toggle('active');
      navLinks.classList.toggle('active');
    });

    // Auto-close menu drawer when clicking any link
    const links = navLinks.querySelectorAll('a');
    links.forEach(link => {
      link.addEventListener('click', () => {
        mobileMenuBtn.classList.remove('active');
        navLinks.classList.remove('active');
      });
    });

    // Close menu when clicking outside of nav-links and mobileMenuBtn
    document.addEventListener('click', (e) => {
      if (!navLinks.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
        mobileMenuBtn.classList.remove('active');
        navLinks.classList.remove('active');
      }
    });
  }

  // Intersection Observer for scroll animations
  const observerOptions = { root: null, rootMargin: '0px', threshold: 0.1 };
  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));

  // Accordions (Mission/Vision & FAQ)
  const accordionItems = document.querySelectorAll('.accordion-item, .faq-item');
  accordionItems.forEach(item => {
    item.addEventListener('click', () => {
      const isActive = item.classList.contains('active');
      
      // Close all items
      accordionItems.forEach(otherItem => {
        otherItem.classList.remove('active');
        const symbol = otherItem.querySelector('span');
        if (symbol) symbol.textContent = '+';
      });

      // If it wasn't active before click, open it now
      if (!isActive) {
        item.classList.add('active');
        const symbol = item.querySelector('span');
        if (symbol) symbol.textContent = '-';
      }
    });
  });

  // Project Gallery Tabs & Interactive Category Filters
  const tabs = document.querySelectorAll('.tab');
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
    });
  });

  const projectTabs = document.querySelectorAll('.project-tab');
  const galleryItems = document.querySelectorAll('.gallery-grid .gallery-item');
  
  if (projectTabs.length > 0 && galleryItems.length > 0) {
    projectTabs.forEach(tab => {
      tab.addEventListener('click', () => {
        projectTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        
        const filterValue = tab.getAttribute('data-filter');
        
        galleryItems.forEach(item => {
          item.classList.add('fade-out');
          
          setTimeout(() => {
            const itemCategory = item.getAttribute('data-category');
            if (filterValue === 'all' || itemCategory === filterValue) {
              item.classList.remove('hidden');
              requestAnimationFrame(() => {
                item.classList.remove('fade-out');
              });
            } else {
              item.classList.add('hidden');
            }
          }, 400);
        });
      });
    });
  }

  // Stats Counting Animation
  const statsSection = document.querySelector('.stats-section');
  const counters = document.querySelectorAll('.counter-val');
  
  if (statsSection && counters.length > 0) {
    const runCounters = () => {
      counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const duration = 2000; // 2 seconds animation
        const steps = 50;
        const stepTime = duration / steps;
        let current = 0;
        const increment = target / steps;
        
        const timer = setInterval(() => {
          current += increment;
          if (current >= target) {
            current = target;
            clearInterval(timer);
          }
          
          const rounded = Math.floor(current);
          if (target === 5000) {
            counter.textContent = rounded.toLocaleString('en-US'); // Add comma formatting for 5,000
          } else {
            counter.textContent = rounded;
          }
        }, stepTime);
      });
    };

    const statsObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          runCounters();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });

    statsObserver.observe(statsSection);
  }

  // Sticky Scroll Header
  const navbar = document.getElementById('navbar');
  if (navbar) {
    const handleScroll = () => {
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    };
    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Run initially
  }
});
