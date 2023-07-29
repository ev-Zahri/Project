window.addEventListener('DOMContentLoaded', (event) => {
    const elem = document.getElementById("text");
    const text = elem.textContent; // Tekst yang akan ditampilkan dengan efek pengetikan
    let index = 0;
  
    function type() {
      if (index < text.length) {
        document.getElementById("text").textContent += text.charAt(index);
        index++;
        setTimeout(type, 100);
      }
    }
    
});
var images = ['img/kos1.jpg', 'img/kos4.jpg', 'img/kos5.jpg']; // Ganti dengan nama file gambar yang ingin digunakan
var colorsText = ['black', 'white', '#F9E9EC'];
var colorsBorder = ['white', 'black', '#FAC748'];
var currentIndex = 0;

function changeBackground() {
  currentIndex = (currentIndex + 1) % images.length;
  const header = document.getElementById("header");
  const text = document.getElementById("text");
  text.style.color = colorsText[currentIndex];
  text.style.borderBottomColor = colorsBorder[currentIndex];  
  header.style.backgroundImage = "url('" + images[currentIndex] + "')";
}

setInterval(changeBackground, 5000);

var cards = document.querySelectorAll('.card');
var modals = document.querySelectorAll('.modal');
var closeButtons = document.querySelectorAll('.close');
var isModalOpen = false;
var timeout;

function openModal(index) {
    modals[index].style.display = 'block';
    isModalOpen = true;
}

function closeModal(index) {
    modals[index].style.display = 'none';
    isModalOpen = false;
}

// Event listener saat gambar dihover
cards.forEach(function(card, index) {
    card.addEventListener('mouseover', function() {
        if (!isModalOpen) {
            timeout = setTimeout(function() {
                openModal(index);
            }, 800);
        }
    });

    card.addEventListener('mouseout', function() {
        clearTimeout(timeout);
    });
});

// Event listener saat tombol close di klik
closeButtons.forEach(function(closeButton, index) {
    closeButton.addEventListener('click', function() {
        closeModal(index);
    });
});

function confirmSubmit() {
    return confirm("Apakah Anda yakin ingin memesan?");
}
// ...

function confirmSubmit() {
    var tMulai = new Date(document.getElementById("tMulai").value);
    var tSelesai = new Date(document.getElementById("tSelesai").value);
    var timeDiff = Math.abs(tSelesai.getTime() - tMulai.getTime());
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

    if (diffDays < 30 || diffDays % 30 !== 0) {
        alert("Periode sewa harus lebih dari 30 hari dan kelipatan 30 hari sejak tanggal mulai.");
        return false;
    }

    return confirm("Apakah Anda yakin ingin memesan?");
}

// ...
