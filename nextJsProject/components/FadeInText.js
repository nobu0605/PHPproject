// Dependencies
import React from 'react'
import { VelocityTransitionGroup } from 'velocity-react'

// Define <Greet />
export default class FadeInText extends React.Component {
  constructor() {
    super()

    this.state = {
      children: [
        <h1
          key={1}
          style={{
            color: 'white',
            fontSize: 80
          }}
        >
          Welcom To Mysite
        </h1>
      ]
    }
  }
  render() {
    return (
      <VelocityTransitionGroup
        runOnMount={true}
        enter={{
          animation: 'fadeIn',
          stagger: 100
        }}
        leave={{
          animation: 'fadeOut',
          stagger: 100
        }}
      >
        {this.state.children}
      </VelocityTransitionGroup>
    )
  }
}
