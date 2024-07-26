import {FiPlus, FiSearch} from 'react-icons/fi'
import { Container, Brand, Menu, Search, Content, NewNote } from './styles';

import { Link } from 'react-router-dom';
import { Header } from '../../components/header'
import { Input } from '../../components/Input'
import { Section } from '../../components/section'
import { Note } from '../../components/Note'
import { ButtonText } from '../../components/ButtonText'

export function Home(){
    return(
        <Container>
            <Brand>
            <h1>Rocketnotes</h1>
            </Brand>

            <Header />

            <Menu>
                <li><ButtonText title="Todos" $isactive='true' /></li>                
                <li><ButtonText title="React" /></li>                
                <li><ButtonText title="Nodejs" /></li>                            
            </Menu>        
            
            <Search>

            <Input placeholder="Pesquisar pelo título" icon={FiSearch} />

            </Search>

            <Content>
                <Section title="Minhas Notas">
                    <Note data={{title:'React', 
                    tags:[
                        {id:'1', name:'react'},
                        {id:'2', name:'rocketseat'}

                    ]
                    }}
                    />
                </Section>
            </Content>

            <NewNote to="/new">
                <FiPlus /> Criar Nota
            </NewNote>
        </Container>

    )


}
