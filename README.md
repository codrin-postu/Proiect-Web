# ClassMa

ClassMa este un utilitar pentru managementul uneia sau mai multor clase. Acest utilitar ofera posibilitatea de a crea un cod care sa expire dupa un timp, de a nota studentii si de a verifica temele acestora.

Acest proiect face parte din cursul Tehnologii Web.

## Cerinte

Se dorește realizarea unui utilitar pentru managementul unei grupe de studenți. Soluția Web trebuie să permită minimal:

- Posibilitatea de a genera un cod ce va fi utilizat pentru a face prezența (cod ce va expira după o perioada de S secunde).
- Posibilitatea de a pune un numar de note (același pentru toți studenții) și de a folosi o formulă matematică ce utilizează operatori de bază (minimal: +, -, \*, /, round, floor, ceil) pentru a calcula o notă finală.
- Studenții vor avea posibilitatea de încarcare a unor documente ce trebuie să fie notate de către profesor și de a-și vedea notele propuse de acesta.
- Profesorii pot accepta studenții într-o anumita grupă sau pot revoca acest drept, pot pune note asociate diverselor teme sau pentru ascultari.
- Profesorii vor avea posibilitatea de generare a unui catalog ce poate fi exportat în oricare dintre formatele CSV, HTML, PDF.

## Cum sa pornesti serverul local

Asigura-te ca esti pe folderul principal "Proiect-Web". Intra in "public" si porneste serverul php.

```bash
cd public
php -S localhost:80
```

## Licenta

[MIT](https://choosealicense.com/licenses/mit/)
