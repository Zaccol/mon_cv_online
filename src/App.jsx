import React from 'react';
import Header from './components/Header';
import About from './components/About';
import Experience from './components/Experience';
import Skills from './components/Skills';
import ContactForm from './components/ContactForm';
import './App.css';

const App = () => {
  return (
    <div className="App">
      <Header />
      <main>
        <About />
        <Experience />
        <Skills />
        <ContactForm />
      </main>
    </div>
  );
};

export default App;
