<hr class="footer-divider">
<footer class="elegant-footer">
  <div class="footer-content">
    <div class="footer-text">
      <p class="contact-info">
        <i class="fas fa-envelope"></i>
        Contact: lifeindex@gmail.com
      </p>

      <p class="phone-info">
        <i class="fas fa-phone-alt"></i>
        Phone: 9865778900
      </p>

      <p class="copyright">
        <i class="fas fa-heart"></i>
        © 2025 LifeIndex Matrimonial
      </p>
    </div>

    <div class="footer-decoration">
      <div class="floating-hearts">
        <div class="heart">❤</div>
        <div class="heart">❤</div>
        <div class="heart">❤</div>
      </div>
    </div>
  </div>
</footer>

<style>
.footer-divider {
  height: 2px;
  background: linear-gradient(90deg, transparent 0%, #8a2be2 50%, transparent 100%);
  border: none;
  margin: 20px 0 0 0;
  animation: glow 3s ease-in-out infinite alternate;
}

@keyframes glow {
  0% { opacity: 0.7; background: linear-gradient(90deg, transparent 0%, #8a2be2 50%, transparent 100%); }
  100% { opacity: 1; background: linear-gradient(90deg, transparent 0%, #ff6b6b 50%, transparent 100%); }
}

.elegant-footer {
  background: linear-gradient(135deg, #4b0082 0%, #2d004d 100%);
  color: white;
  padding: 30px 20px;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.elegant-footer::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
}

.footer-content {
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

.footer-text {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 40px;
  flex-wrap: wrap;
}

.contact-info, .phone-info, .copyright {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 16px;
  font-weight: 400;
  margin: 0;
  padding: 8px 20px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 25px;
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  transition: all 0.3s ease;
}

.contact-info:hover, .phone-info:hover, .copyright:hover {
  background: rgba(255, 255, 255, 0.15);
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(138, 43, 226, 0.3);
}

.contact-info i, .phone-info i, .copyright i {
  color: #ff6b6b;
  font-size: 18px;
  transition: transform 0.3s ease;
}

.contact-info:hover i, .phone-info:hover i, .copyright:hover i {
  transform: scale(1.2);
}

.footer-decoration {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  transform: translateY(-50%);
  pointer-events: none;
}

.floating-hearts {
  position: relative;
  height: 50px;
}

.heart {
  position: absolute;
  font-size: 14px;
  color: #ff6b6b;
  opacity: 0;
  animation: float 6s ease-in-out infinite;
}

.heart:nth-child(1) { left: 15%; animation-delay: 0s; }
.heart:nth-child(2) { left: 50%; animation-delay: 2s; }
.heart:nth-child(3) { left: 85%; animation-delay: 4s; }

@keyframes float {
  0% { transform: translateY(0) scale(0); opacity: 0; }
  10% { opacity: 1; transform: translateY(-10px) scale(1); }
  90% { opacity: 1; transform: translateY(-40px) scale(1); }
  100% { transform: translateY(-50px) scale(0); opacity: 0; }
}

/* Responsive Design */
@media (max-width: 768px) {
  .footer-text {
    flex-direction: column;
    gap: 15px;
  }
  
  .contact-info, .phone-info, .copyright {
    font-size: 14px;
    padding: 6px 15px;
  }
  
  .elegant-footer {
    padding: 25px 15px;
  }
}

@media (max-width: 480px) {
  .contact-info, .phone-info, .copyright {
    font-size: 13px;
    padding: 5px 12px;
  }
  .floating-hearts { display: none; }
}

/* Smooth entrance animation */
.elegant-footer {
  opacity: 0;
  transform: translateY(20px);
  animation: slideUp 0.8s ease-out 0.3s forwards;
}

@keyframes slideUp {
  to { opacity: 1; transform: translateY(0); }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const footerTexts = document.querySelectorAll('.contact-info, .phone-info, .copyright');
  
  footerTexts.forEach(text => {
    text.addEventListener('click', function(e) {
      const ripple = document.createElement('span');
      const rect = this.getBoundingClientRect();
      const size = Math.max(rect.width, rect.height);
      const x = e.clientX - rect.left - size / 2;
      const y = e.clientY - rect.top - size / 2;
      
      ripple.style.width = ripple.style.height = size + 'px';
      ripple.style.left = x + 'px';
      ripple.style.top = y + 'px';
      ripple.style.position = 'absolute';
      ripple.style.borderRadius = '50%';
      ripple.style.background = 'rgba(255, 255, 255, 0.3)';
      ripple.style.transform = 'scale(0)';
      ripple.style.animation = 'ripple 0.6s linear';
      ripple.style.pointerEvents = 'none';
      
      this.style.position = 'relative';
      this.style.overflow = 'hidden';
      this.appendChild(ripple);
      
      setTimeout(() => ripple.remove(), 600);
    });
  });

  const style = document.createElement('style');
  style.textContent = `
    @keyframes ripple {
      to { transform: scale(4); opacity: 0; }
    }
  `;
  document.head.appendChild(style);

  // Email click functionality
  const contactInfo = document.querySelector('.contact-info');
  contactInfo.style.cursor = 'pointer';
  contactInfo.title = 'Click to copy email';
  
  contactInfo.addEventListener('click', function() {
    const email = 'lifeindex@gmail.com';
    navigator.clipboard.writeText(email).then(() => {
      const originalText = this.innerHTML;
      this.innerHTML = '<i class="fas fa-check"></i> Email copied!';
      this.style.background = 'rgba(76, 175, 80, 0.2)';
      
      setTimeout(() => {
        this.innerHTML = originalText;
        this.style.background = '';
      }, 2000);
    });
  });

  // Phone click functionality
  const phoneInfo = document.querySelector('.phone-info');
  phoneInfo.style.cursor = 'pointer';
  phoneInfo.title = 'Click to copy number';
  
  phoneInfo.addEventListener('click', function() {
    const phone = '9865778900';
    navigator.clipboard.writeText(phone).then(() => {
      const originalText = this.innerHTML;
      this.innerHTML = '<i class="fas fa-check"></i> Number copied!';
      this.style.background = 'rgba(76, 175, 80, 0.2)';
      
      setTimeout(() => {
        this.innerHTML = originalText;
        this.style.background = '';
      }, 2000);
    });
  });
});

// Parallax effect
window.addEventListener('scroll', function() {
  const footer = document.querySelector('.elegant-footer');
  const scrolled = window.pageYOffset;
  const rate = scrolled * -0.5;
  footer.style.transform = `translateY(${rate}px)`;
});
</script>
