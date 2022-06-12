import { createContext, useEffect, useState } from "react";

import { api } from '../services/api';

export const AuthContext = createContext({});

export const AuthProvider = ({ children }) => {
  const [user, setUser] = useState();

  useEffect(() => {
    const user = JSON.parse(localStorage.getItem('user'));

    if (user) {
      setUser(user);
    }
  }, []);

  async function signIn(email, password) {
    const res = await api.post('login', {
        email,
        password
      })
      .then(res => {
        const user = {
          email,
          password,
          token: res.data
        }

        localStorage.setItem('user', JSON.stringify(user));
        setUser(user);
        return true;
      })
      .catch(err => {
        console.log(err)
        return false;
      })

      return res;
  };

  async function signUp(email, password) {
    const res = await api.post('register', {
      email,
      password
    })
    .then(res => {
      return true;
    })
    .catch(err => {
      console.log(err)
      return false;
    })

    return res;
  }

  return (
    <AuthContext.Provider
      value={{ signIn, signUp, user, signed: !!user }}
    >
      {children}
    </AuthContext.Provider>
  );
};
