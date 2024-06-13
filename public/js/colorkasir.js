// Mengambil URL dari browser
const urlParams = new URLSearchParams(window.location.search);

const merkId = urlParams.get('merk');

const allElement = document.getElementById('All');

const linkElements = document.querySelectorAll('a.py-1[href*="merk="]');

// Menambahkan kelas css berdasarkan ID merek
linkElements.forEach(link => {
    const linkMerkId = link.getAttribute('href').split('=')[1];
    if (linkMerkId === merkId) {
        link.classList.add('bg-[#fa9e3b1e]', 'text-[#e07946]');
        link.classList.remove('bg-[#151e3b]', 'hover:bg-[#fa9e3b]', 'hover:bg-opacity-10',
            'hover:text-[#e07946]');
    } else if (merkId === null) {
        // Jika tidak ada parameter 'merk' pada URL, maka ini adalah elemen "All"
        allElement.classList.add('bg-[#fa9e3b1e]', 'text-[#e07946]');
        allElement.classList.remove('bg-[#151e3b ]', 'hover:bg-[#fa9e3b]', 'hover:bg-opacity-10',
            'hover:text-[#e07946]');
    } else {
        link.classList.remove('bg-[#fa9e3b1e]', 'text-[#e07946]');
        link.classList.add('bg-[#151e3b]', 'hover:bg-[#fa9e3b]', 'hover:bg-opacity-10',
            'hover:text-[#e07946]');
    }
});