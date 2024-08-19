class Texto():
    def alinhar_topicos(self,itens):
        maior = self.contagem(itens)
        for item in itens:
            while len(item) < maior:
                item += " "
            item += ":"
            print(item)

    def contagem(self,itens):
        maior = 0
        for item in itens:
            n = len(item)
            if n > maior:
                maior = n
        maior += 1
        return maior
    def tabela(self,itens):
        maior = self.contagem(itens)+13
        numr = len(itens)*2+1
        a = 0
        for i in range(numr):
            if i%2 == 1:
                p = a+1
                p = str(p)
                linha = "[ "+p+" -> "
                linha += itens[a]
                while len(linha) < maior:
                    linha += " "
                linha += "]"
                print(linha)
                a += 1
            else:
                linha = "="
                while len(linha) < maior:
                    linha += "="
                linha += "="
                print(linha)