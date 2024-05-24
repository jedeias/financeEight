* Nessa pasta aconteceu algo interessante que me forçou a implementar uma interface.

** Como há dois tipos de cartões, optei por usar o Princípio de Liskov em vez de fazer pastas independentes para evitar erros e deixar a implementação do sistema mais expansível. Acredito que não haverá novas implementações de cartões, mas por segurança essas medidas foram tomadas.

** Bom, ao analisar a situação, a pasta de compras muito provavelmente terá o mesmo conceito aplicado, já que segue o mesmo princípio.

** lembrei que o php não permite polimorfismo de sobrecarga, então tratei esse problema substituindo a herança por uma injeção de dependencia assim, dando total liberdade de criar qualquer método que não use palaveras reservadas pela linguagem.