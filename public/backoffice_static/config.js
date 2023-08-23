window.ENV = 'uat';
window.API_URL = '';

if (window.ENV === 'prd') {
    window.API_URL = 'https://hrm-api-uat.unit.co.th/';
} else {
    window.API_URL = 'http://localhost:3333/';
}
