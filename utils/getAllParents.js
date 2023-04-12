function getAllParents(element) {
    var parents = [];
  
    // Ajouter le parent direct de l'élément
    var parent = element.parentElement;
    while (parent !== null) {
      parents.push(parent);
      parent = parent.parentElement;
    }
  
    return parents;
  }