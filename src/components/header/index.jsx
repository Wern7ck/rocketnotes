import {RiShutDownLine} from 'react-icons/ri';

import { useAuth } from '../../hooks/auth';
import { api } from '../../Services/api';
import { Link } from 'react-router-dom';
import { Container , Profile, Logout } from "./styles";

export function Header(){

    const { signOut, user } = useAuth();

    const avatarURL = user.avatar ? `${api.defaults.baseURL}/files/${user.avatar}` : avatarPlaceholder


    return(
        <Container>
        <Profile to="/profile">
            <img src={avatarURL} alt={user.name} />

        <div>
            <span>Bem-Vindo(a)</span>
            <strong>{user.name}</strong>
        </div>

        </Profile>
        <Logout onClick={signOut}>
            <RiShutDownLine /> 
        </Logout>

        </Container>
    );
}