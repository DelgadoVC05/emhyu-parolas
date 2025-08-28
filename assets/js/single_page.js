document.addEventListener('DOMContentLoaded', function () {
    const headings = document.querySelectorAll('.article-content h1, .article-content h2, .article-content h3');
    const toc = document.getElementById('tableOfContents');

    if (headings.length > 0 && toc) {
        const tocList = document.createElement('ul');

        headings.forEach((heading, index) => {
            const id = 'heading-' + index;
            heading.id = id;

            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '#' + id;
            a.textContent = heading.textContent;
            a.addEventListener('click', function (e) {
                e.preventDefault();
                heading.scrollIntoView({ behavior: 'smooth' });
            });

            li.appendChild(a);
            tocList.appendChild(li);
        });

        toc.appendChild(tocList);
    } else {
        document.querySelector('.toc-widget').style.display = 'none';
    }
});

// Social Share Functionality
document.addEventListener('DOMContentLoaded', function () {
    const shareButtons = document.querySelectorAll('.share-buttons a');
    const currentUrl = window.location.href;
    const title = document.title;

    shareButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const platform = this.dataset.platform;

            let shareUrl = '';

            switch (platform) {
                case 'facebook':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`;
                    break;
                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(currentUrl)}&text=${encodeURIComponent(title)}`;
                    break;
                case 'linkedin':
                    shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(currentUrl)}`;
                    break;
                case 'copy':
                    navigator.clipboard.writeText(currentUrl).then(() => {
                        alert('Link copied to clipboard!');
                    });
                    return;
            }

            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=400');
            }
        });
    });
});

// Active TOC highlighting
window.addEventListener('scroll', function () {
    const headings = document.querySelectorAll('.article-content h1, .article-content h2, .article-content h3');
    const tocLinks = document.querySelectorAll('.table-of-contents a');

    let current = '';

    headings.forEach(heading => {
        const rect = heading.getBoundingClientRect();
        if (rect.top <= 100) {
            current = heading.id;
        }
    });

    tocLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === '#' + current) {
            link.classList.add('active');
        }
    });
});