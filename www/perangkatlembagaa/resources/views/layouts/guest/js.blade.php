<script>
document.addEventListener('DOMContentLoaded', function () {
    const bg = document.getElementById('bg-slideshow');
    if (!bg) return;

    const images = [
        "https://images.unsplash.com/photo-1506744038136-46273834b3fb",
        "https://images.unsplash.com/photo-1507525428034-b723cf961d3e",
        "https://images.unsplash.com/photo-1501785888041-af3ef285b470",
        "https://images.unsplash.com/photo-1526772662000-3f88f10405ff"
    ];

    let i = 0;

    function slideBg() {
        bg.style.opacity = 0;
        setTimeout(() => {
            bg.style.backgroundImage = `url('${images[i]}')`;
            bg.style.opacity = 1;
            i = (i + 1) % images.length;
        }, 800);
    }

    slideBg();
    setInterval(slideBg, 6000);
});
</script>
