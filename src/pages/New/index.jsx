import { Link } from 'react-router-dom'
import { Header } from "../../components/header"
import { Input } from "../../components/Input"
import { Textarea } from "../../components/Textarea"
import { NoteItem } from "../../components/NoteItem";
import { Section } from "../../components/section"
import { Button } from "../../components/button"

import { Container, Form } from "./styles";

export function New(){
    return(
        <Container>
            <Header />
            <main>
                <Form>
                    <header>
                        <h1>Criar Nota</h1>
                        <Link to="/">Voltar</Link>
                    </header>

                    <Input placeholder="Titulo" />
                    <Textarea placeholder="Observações" />
                    <Section title="Links úteis">
                        <NoteItem  value="https://rocketseat.com.br"/>
                        <NoteItem  isNew placeholder="Novo Link"/>
                    </Section>
                    <Section title="Marcadores">
                        <div className="tags">
                    <NoteItem  value="React"/>
                    <NoteItem  isNew placeholder="Nova Tag"/>
                    </div>
                    </Section>
                    <Button title="Salvar" />
                </Form>
            </main>
        </Container>
    )
}