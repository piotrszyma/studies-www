// courseId as global variable injected from backend

(() => {

  let bodyElement;
  let captchaElement;
  let formElement;
  let formHeaderElement;
  let submitButton;
  let formItems;
  let courseId;

  const opinionTemplate = ({ author, comment, created }) => `
  <div class="row opinion">
    <div class="col-1">
      <div class="opinion__info">
        <span class="opinion__author"> ${author} </span>
        <span class="opinion__created"> ${created} </span>
      </div>
      <div class="opinion__body"> ${comment} </div>
    </div>
  </div>
  `

  const renderOpinions = (opinions) => {
    bodyElement.innerHTML = `
      <div class="col-1">
        ${opinions.map(o => opinionTemplate(o)).join('\n')}
      </div>
    `;

    MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
  };

  submitHandler = async (event) => {
    if (event.target.form.checkValidity()) {
      event.preventDefault();
      const formData = {};

      formItems.forEach(i => {
        formData[i.name] = { 'value': i.value };

        if (i.name === 'captcha') {
          formData[i.name]['question'] = i.dataset['question'];
          formData[i.name]['hash'] = i.dataset['hash'];
        }
      });

      const response = await post(`/opinion/${courseId}`, formData);

      if (!response.success) {
        captchaElement.setCustomValidity('Zła odpowiedź');
        captchaElement.reportValidity();
        return;
      }

      formElement.remove();
      formHeaderElement.innerHTML = 'Opinia została dodana pomyślnie!';

      const { data } = await get(`/opinion/${courseId}`);

      renderOpinions(data);
    }
  };

  const get = async (url) => {
    const rawResponse = await fetch(url);
    return await rawResponse.json();
  }

  const post = async (url, payload) => {
    const rawResponse = await fetch(url, {
      method: 'POST',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(payload)
    });
    return await rawResponse.json();
  }

  window.onload = async () => {
    bodyElement = document.querySelector('.body');
    submitButton = document.querySelector('.form button');
    formItems = document.querySelectorAll('[data-type=field]');
    captchaElement = document.querySelector('input[name="captcha"]');
    formElement =  document.querySelector('.form');
    formHeaderElement = document.querySelector('.form__header');
    courseId = bodyElement.dataset.course;

    const { data } = await get(`/opinion/${courseId}`);
    renderOpinions(data);

    submitButton.addEventListener('click', submitHandler);

    captchaElement.onchange = () => {
      captchaElement.setCustomValidity('');
    };

    bodyElement.classList.remove('loading');
  };
})();



