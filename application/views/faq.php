    <!-- ABOUT SECTION START -->
    <div class="section-full welcome-section-outer">
        <br>
        <div style="background: black;height: 75px;padding-top: 20px;">
        <h3 style="text-align:center;color:white;"><?php echo $page_title; ?></h3>
        </div>
            <div class="welcome-section-top bg-white  p-b50">
                <div class="container">
                    <div >                  
                    <br>
                <div class="container">
                    <div class="accordion">
                        <?php foreach ($data as $index => $faq_item): ?>
                            <div class="accordion-item">
                                <button id="accordion-button-<?= $index + 1 ?>" aria-expanded="false">
                                    <span class="accordion-title"><?= htmlspecialchars($faq_item['faq_title']) ?></span>
                                    <span class="icon" aria-hidden="true"></span>
                                </button>
                                <div class="accordion-content">
                                    <p><?= htmlspecialchars($faq_item['faq_answer']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>  
<!-- ABOUT SECTION  SECTION END -->       
<style>
@import url('https://fonts.googleapis.com/css?family=Hind:300,400&display=swap');
.accordion .accordion-item {
  border-bottom: 1px solid #e5e5e5;
}
.accordion .accordion-item button[aria-expanded='true'] {
  border-bottom: 1px solid #000000;
}
.accordion button {
  position: relative;
  display: block;
  text-align: left;
  width: 100%;
  padding: 1em 0;
  color: #7288a2;
  font-size: 1.15rem;
  font-weight: 400;
  border: none;
  background: none;
  outline: none;
}
.accordion button:hover,
.accordion button:focus {
  cursor: pointer;
  color: #000000;
}
.accordion button:hover::after,
.accordion button:focus::after {
  cursor: pointer;
  color: #000000;
  border: 1px solid #000000;
}
.accordion button .accordion-title {
  padding: 1em 1.5em 1em 0;
}
.accordion button .icon {
  display: inline-block;
  position: absolute;
  top: 18px;
  right: 0;
  width: 22px;
  height: 22px;
  border: 1px solid;
  border-radius: 22px;
}
.accordion button .icon::before {
  display: block;
  position: absolute;
  content: '';
  top: 9px;
  left: 5px;
  width: 10px;
  height: 2px;
  background: currentColor;
}
.accordion button .icon::after {
  display: block;
  position: absolute;
  content: '';
  top: 5px;
  left: 9px;
  width: 2px;
  height: 10px;
  background: currentColor;
}
.accordion button[aria-expanded='true'] {
  color: #000000;
}
.accordion button[aria-expanded='true'] .icon::after {
  width: 0;
}
.accordion button[aria-expanded='true'] + .accordion-content {
  opacity: 1;
  max-height: 9em;
  transition: all 200ms linear;
  will-change: opacity, max-height;
}
.accordion .accordion-content {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  transition: opacity 200ms linear, max-height 200ms linear;
  will-change: opacity, max-height;
}
.accordion .accordion-content p {
  font-size: 1rem;
  font-weight: 300;
  margin: 2em 0;
}
</style>
<script>
const items = document.querySelectorAll('.accordion button');
function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}
items.forEach((item) => item.addEventListener('click', toggleAccordion));
</script>