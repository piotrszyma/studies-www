(() => {
  const toImageString = (src) => {
    return new Promise((resolve) => {
      const img = new Image();
      img.crossOrigin = 'Anonymous';

      img.onload = function() {
        const canvas = document.createElement('CANVAS');
        const ctx = canvas.getContext('2d');
        canvas.height = this.naturalHeight;
        canvas.width = this.naturalWidth;
        ctx.drawImage(this, 0, 0);

        const dataURL = canvas.toDataURL('image/jpeg');
        resolve(dataURL);
      };

      img.src = src;
    });
  };

  const attachImage = (imageString) => {
    const image = document.querySelector('img');
    image.src = imageString;
  };

  window.onload = async () => {
    let imageString = localStorage.getItem('img');

    if (imageString === null) {
        imageString = await toImageString('http://localhost:8001/assets/photo.jpeg');
        localStorage.setItem('img', imageString);
    }

    attachImage(imageString);
  };
})();
