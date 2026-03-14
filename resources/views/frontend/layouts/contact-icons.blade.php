<!-- Floating Contact Icons -->
<div class="floating-contact-icons">
  <!-- Call Icon -->
  <a href="tel:+8801712359608" class="contact-icon call-icon" title="Call us">
    <i class="bi bi-telephone-fill"></i>
  </a>

  <!-- WhatsApp Icon -->
  <a href="https://wa.me/01712359608" target="_blank" rel="noopener noreferrer" class="contact-icon whatsapp-icon" title="Chat on WhatsApp">
    <i class="bi bi-whatsapp"></i>
  </a>
</div>

<style>
  .floating-contact-icons {
    position: fixed;
    right: 20px;
    bottom: 100px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    z-index: 999;
  }

  .floating-contact-icons .contact-icon {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    text-decoration: none;
    color: white;
    font-size: 24px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }

  .floating-contact-icons .call-icon {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  }

  .floating-contact-icons .call-icon:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
  }

  .floating-contact-icons .whatsapp-icon {
    background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
  }

  .floating-contact-icons .whatsapp-icon:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
  }

  /* Mobile responsive */
  @media (max-width: 768px) {
    .floating-contact-icons {
      right: 15px;
      bottom: 80px;
    }

    .floating-contact-icons .contact-icon {
      width: 45px;
      height: 45px;
      font-size: 20px;
    }
  }
</style>
