emocion(feliz,[alegre,contento,emocionado,sonriente]).
emocion(triste,[depresivo,aguitado,afligifdo,nostalgico]).
emocion(serio,[apatico,indiferente,tenso,neutral]).

emocionde(Estado,Animo) :- emocion(Estado, Animos), buscar(Animo, Animos).
buscar(Animo,[]) :- !, fail.
buscar(Animo,[Animo|L]) :- !, true.
buscar(Animo,[C|L]) :- buscar(Animo,L).
