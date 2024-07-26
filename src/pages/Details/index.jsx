import { Container, Links, Content } from './styles.js'

import { Header } from '../../components/header'
import { Section } from '../../components/section'
import { ButtonText } from '../../components/ButtonText/'
import { Button } from '../../components/button'
import { Tag } from '../../components/Tag'

export function Details(){

  return(
    <Container>
    <Header />
    <main>
      <Content>
     <ButtonText title="Excluir nota" />

     <h1>Introdução ao React</h1>

     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi soluta officiis,
       at omnis, voluptas eaque, aspernatur nobis cupiditate distinctio mollitia inventore.
       Molestiae eveniet dolorum quia iusto eligendi deleniti totam illum.</p>

    <Section title ="Links úteis">
      <Links>
        <li><a href="https://www.rocketseat.com.br/">RocketSeat</a></li>
        <li><a href="https://www.rocketseat.com.br/">RocketSeat</a></li>
      </Links>
    </Section>

    <Section title="Marcadores">
      <Tag title="Express" />
      <Tag title="Node" />

    </Section>
    
      <Button title="Voltar"/>

    </Content>
    </main>
    </Container>
  )
}