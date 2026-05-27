document.addEventListener('DOMContentLoaded', () => {
  // Mobile Nav (Placeholder behavior)
  const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
  const navLinks = document.querySelector('.nav-links');
  if(mobileMenuBtn && navLinks) {
    mobileMenuBtn.addEventListener('click', () => {
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
});
