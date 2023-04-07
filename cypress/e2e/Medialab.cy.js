describe('login', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000')
    cy.get(':nth-child(4) > :nth-child(2) > .nav-link').click();
    cy.get('#email').clear('a');
    cy.get('#email').type('admin@gmail.com');
    cy.get('#password').clear('P');
    cy.get('#password').type('Password');
    cy.get('.btn-primary').click();
    cy.get('#password').clear('pa');
    cy.get('#password').type('password');
    cy.get('.btn-primary').click();
  })
})
describe('challenges', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000')
    cy.get(':nth-child(4) > .nav-link').click();
    cy.get('.btn').click();
    cy.get('#navbarSupportedContent > :nth-child(1) > :nth-child(1) > .nav-link').click();
    cy.get('[href="http://127.0.0.1:8000/posts/1"] > .card > .row > .col-1 > .card-post-avatar').click();
    cy.get('.o-nav-logo').click();
  })
})