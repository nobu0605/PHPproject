import React from 'react'
import styled from 'styled-components'

export default class Header extends React.Component {
  render() {
    return (
      <div
        style={{
          position: 'fixed',
          zIndex: 10,
          height: 80,
          width: '100%',
          background: 'rgba(0,0,0,0.5)'
        }}
      >
        <HeaderText>Next</HeaderText>
        <div style={{ float: 'right' }}>
          <HeaderText>Next.js</HeaderText>
          <HeaderText>React.js</HeaderText>
        </div>
      </div>
    )
  }
}

const HeaderText = styled.span`
  color: white;
  margin: 20px;
  font-size: 30px;
  display: inline-block;
`
