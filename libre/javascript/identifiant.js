let identifiants = document.getElementsByClassName('identifiant');

for (const identifiant of identifiants) {
  identifiant.addEventListener('click', function (e) {
    let id = e.target.dataset.id;
    ajaxGet("/decrypt/id/" + id, function (json){
      var decrypt = JSON.parse(json);
      var pseudo = decrypt["pseudo"];
      var mdp = decrypt["mdp"];
      var txtPseudo = document.getElementById("pseudo-" + id);
      txtPseudo.textContent = ('Pseudo : ') + pseudo;
      var txtMdp = document.getElementById("password-" + id);
      txtMdp.textContent = ('Mot de passe : ') + mdp;

    });
 })
}
